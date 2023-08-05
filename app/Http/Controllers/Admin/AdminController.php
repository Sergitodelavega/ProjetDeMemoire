<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
use session;
use App\Models\User;
use App\Models\Doctorant;
use App\Models\Encadreur;
use App\Mail\AccountActivationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function doctorants()
    {
        $doctorants = Doctorant::all();

        return view("admin.doctorants", compact("doctorants"));
    }

    public function encadreurs(){

        $encadreurs = Encadreur::all();

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
            'password' => 'required|string|min:6',
            'specialite' => 'required|string'
            // Ajoutez ici les autres règles de validation pour le doctorant
        ]);

        // Créer un nouvel utilisateur (Doctorant)

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->role ="doctorant";
        $user->save();

        $doctorant = new Doctorant([
            'specialite' => $request->input('specialite'),
        ]);
        $doctorant->user()->associate($user);
        $doctorant->save();

        $link = asset(route('index'));

        Mail::to($doctorant->user->email)->send(new AccountActivationEmail($doctorant, $link));
       
        // Ajoutez le message flash pour la création du post
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
            'password' => 'required|string|min:6',
            'grade' => 'required|string',
            'specialite' => 'required|string'
            // Ajoutez ici les autres règles de validation pour l'encadreur
        ]);

         // Créer un nouvel utilisateur (Encadreur)
         $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->role ="encadreur";
        $user->save();

         // Créer un enregistrement dans la table "encadreurs" avec les informations spécifiques
         $encadreur = new Encadreur([
            'grade' => $request->input('grade'),
            'specialite' => $request->input('specialite'),
        ]);
        $encadreur->user()->associate($user);
        $encadreur->save();

        // Ajoutez le message flash pour la création du doctorant
        $request->session()->flash('success', 'Encadreur créé avec succès !');

            return redirect()->route('admin.encadreur')->with('success', 'Compte encadreur créé avec succès.');
    }

}