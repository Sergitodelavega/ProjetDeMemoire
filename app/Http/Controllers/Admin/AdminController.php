<?php
    
namespace App\Http\Controllers\Admin;

use session;
use App\Models\User;
use App\Models\Doctorant;
use App\Models\Encadreur;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Mail\MessageDoctorant;
use App\Mail\MessageEncadreur;
use App\Http\Controllers\Controller;
use App\Models\These;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function createThese(){
        $doctorants = Doctorant::latest()->get();
        // $doctorantNames = $doctorants->mapWithKeys(function ($doctorant) {
        //     return [$doctorant->user->id => $doctorant->user->name];
        // });

        $encadreurs = Encadreur::latest()->get();
        // $encadreurNames = $encadreurs->mapWithKeys(function ($encadreur) {
        //     return [$encadreur->user->id => $encadreur->user->name];
        // });
        return view('admin.create_these', compact('doctorants', 'encadreurs'));
    }

    public function storeThese(Request $request){
        // Validation des données du formulaire
        
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'doctorant_id' => 'required|exists:doctorants,id',
            'encadreur_id' => 'required|exists:encadreurs,id',
            'status' => 'required',
        ]);
        
        // Créer un nouvel projet
        $these = new These([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
            'status' => $request->input('status'),
            'doctorant_id' => $request->input('doctorant_id'),
            'encadreur_id' => $request->input('encadreur_id'),
        ]);

        $doctorantId = $request->input('doctorant_id');
        $encadreurId = $request->input('encadreur_id');

        if($doctorantId && $encadreurId){
            $these->doctorant()->associate($doctorantId);
            $these->encadreur()->associate($encadreurId);
        }

        $these->save();

        return redirect()->route('admin.theses');

    }

    public function deleteFormation($id){
        Formation::where('id', $id)->delete();

        // Ajoutez le message flash pour la suppression de la formation 
        session()->flash('success', 'Formation supprimée avec succès !');

        return redirect()->route('admin.formations');
    }

    public function formations(){
        $formations = Formation::latest()->get();
        return view('admin.formations', compact('formations'));
    }

    public function createFormation(){
        return view('admin.create_formation');
    }

    public function storeFormation(Request $request){
        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'bail|required',
            'date_heure' => 'bail|required',
            'location' => 'bail|required|string|max:255',
            'image' => 'bail|required|image',
        ]);

        // On upload l'image dans "/storage/app/public/posts"
        $chemin_image = $request->image->store("formations");

        // On enregistre les informations du Formation
        Formation::create([
            'title' => $request->title,
            'description' => $request->description,
            'date_heure' => $request->date_heure,
            'location' => $request->location,
            'image' => $chemin_image,
        ]);

        // Ajoutez le message flash pour la création de la formation 
        $request->session()->flash('success', 'Formation créé avec succès !');

        return redirect()->route('admin.formations');

    }

    public function indexTheses(){
        $theses = These::all();
        return view('admin.theses', compact('theses'));
    }

    public function index(){
        return view('admin.index');
    }
    
    public function doctorants()
    {
        // $doctorants = User::where('role', 'doctorant')->get();
        $doctorants = Doctorant::latest()->get();

        return view("admin.doctorants", compact("doctorants"));
    }

    public function encadreurs(){

        // $encadreurs = User::where('role', 'encadreur')->get();
        $encadreurs = Encadreur::latest()->get();

        return view("admin.encadreurs", compact("encadreurs"));
    }

    public function profilAdmin(){
        return view('admin.profil');
    }

    public function profilDoctorant($id){
        $doctorants = Doctorant::all();
        $doctorant = Doctorant::find($id);

        return view('admin.doctorant_profile', compact('doctorant', 'doctorants'));
    }

    public function profilEncadreur($id){
        $doctorants = Doctorant::all();
        $encadreur = Encadreur::find($id);

        return view('admin.encadreur_profile', compact('encadreur', 'doctorants'));
    }

    public function createDoctorant()
    {
        return view('admin.create_doctorant');
    }

    public function storeDoctorant(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'matricule' => 'required|string',
            'specialite' => 'required|string'
        ]);

        // Créer un nouvel utilisateur (Doctorant)

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        $user->role ="doctorant";
        $password = bin2hex(random_bytes(4));
        $user->password = $password;
        $user->save();

        $doctorant = new Doctorant([
            'matricule' => $request->input('matricule'),
            'specialite' => $request->input('specialite'),
        ]);
        $doctorant->user()->associate($user);
        $doctorant->save();

        $link = asset(route('index'));

        Mail::to($doctorant->user->email)->send(new MessageDoctorant($doctorant, $link, $password));
       
        // Ajoutez le message flash pour la création du compte doctorant
        $request->session()->flash('success', 'Doctorant créé avec succès !');

        return redirect()->route('admin.doctorant');
    }

    public function createEncadreur()
    {
        return view('admin.create_encadreur');
    }

    public function storeEncadreur(Request $request)
    {
         // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'matricule' => 'required|string',
            'grade' => 'required|string',
            'specialite' => 'required|string'
        ]);

         // Créer un nouvel utilisateur (Encadreur)
         $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        $user->role ="encadreur";
        $password = bin2hex(random_bytes(4));
        $user->password = $password;
        $user->password= bcrypt($password);
        $user->save();

         // Créer un enregistrement dans la table "encadreurs" avec les informations spécifiques
         $encadreur = new Encadreur([
            'matricule' => $request->input('matricule'),
            'grade' => $request->input('grade'),
            'specialite' => $request->input('specialite'),
        ]);
        $encadreur->user()->associate($user);
        $encadreur->save();

        $link = asset(route('login'));

        Mail::to($encadreur->user->email)->send(new MessageEncadreur($encadreur, $link));

        // Ajoutez le message flash pour la création du compte encadreur
        $request->session()->flash('success', 'Encadreur créé avec succès !');

            return redirect()->route('admin.encadreur');
    }

    public function manageUsers(){
        $users = User::latest()->get();
        return view('admin.manage_users', compact('users'));
    }

}