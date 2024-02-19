<?php
namespace App\Http\Controllers\Admin;

use session;
use App\Models\User;
use App\Models\These;
use App\Models\Activity;
use App\Models\Doctorant;
use App\Models\Encadreur;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Mail\MessageDoctorant;
use App\Mail\MessageEncadreur;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorantRequest;
use App\Http\Requests\EncadreurRequest;
use App\Http\Requests\FormationRequest;
use App\Http\Requests\TheseRequest;
use App\Http\Requests\UpdateDoctorantRequest;
use App\Http\Requests\UpdateEncadreurRequest;
use App\Mail\Formation as MailFormation;
use App\Mail\TheseDoctorant;
use App\Mail\TheseEncadreur;
use App\Models\Ecole;
use App\Models\Laboratoire;
use App\Models\Year;
use Carbon\Carbon;
use Database\Seeders\ActivitySeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Database\Factories\ActivityFactory;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function parcours($doctorant){
        $doctorant = Doctorant::find($doctorant);
        $activities = $doctorant->activities;

        return view('admin.theses.historiques', compact('doctorant', 'activities'));
    }
    public function indexTheses(){
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {
            $theses = These::where('ecole_id', $adminUser->ecole_id)->get();
        }
        return view('admin.theses.index', compact('theses'));
    }

    public function showThese($id){
        $these = These::find($id);
        return view('admin.theses.show', compact('these'));
    }

    public function createThese($id){
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {
            $ecole = Ecole::find($adminUser->ecole_id);

            $encadreurs = Encadreur::with('user')
            ->whereHas('user', function ($query) use ($adminUser){
                $query->where('ecole_id', $adminUser->ecole_id);
            })
            ->get();

            $doctorants = Doctorant::with('user')
            ->whereHas('user', function ($query) use ($adminUser){
                $query->where('ecole_id', $adminUser->ecole_id);
            })
            ->get();
            $doctorant = Doctorant::find($id);

            return view('admin.theses.create', compact("doctorants", "encadreurs", "doctorant"));
        }
    }

    public function storeThese(TheseRequest $request, $id){
        $adminUser = Auth::user();
        if($adminUser->role == "admin"){
        // Créer un nouvel projet
        $these = new These([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        $these->deadline = Carbon::now();
        $these->status = "en cours";
        $doctorant = Doctorant::find($id);
        $doctorantId = Doctorant::find($id)->id;
        $encadreurId = $doctorant->encadreur->id;
        $encadreur = Encadreur::find($encadreurId);

        $ecole = Ecole::find($adminUser->ecole_id);
        $these->ecole_id = $ecole->id;
        
        if($doctorantId && $encadreurId){
            $these->doctorant()->associate($doctorantId);
            $these->encadreur()->associate($encadreurId);
        }
        $these->save();
     
        $request->session()->flash('success', 'Thèse définie avec succès !');
        Mail::to($doctorant->user->email)->send(new TheseDoctorant($doctorant, $these));
        Mail::to($encadreur->user->email)->send(new TheseEncadreur($encadreur, $these));
        
        return redirect()->route('admin.theses');
        }
    }

    public function formations(){
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {
            $formations = Formation::where('ecole_id', $adminUser->ecole_id)->get();
        }
        return view('admin.formations.index', compact('formations'));
    }

    public function createFormation(){
        return view('admin.formations.create');
    }

    public function storeFormation(FormationRequest $request){
        $adminUser = Auth::user();
        if($adminUser->role == "admin"){
            // On upload l'image dans "/storage/app/public/formations"
            $chemin_image = $request->image->store("formations");

            $formation = new Formation([
                'title' => $request->title,
                'description' => $request->description,
                'date_heure' => $request->date_heure,
                'location' => $request->location,
                'image' => $chemin_image,
            ]);

            $ecole = Ecole::find($adminUser->ecole_id);
            $formation->ecole_id = $ecole->id;
            $formation->save();

            $doctorants = Doctorant::with('user')
                ->whereHas('user', function ($query) use ($adminUser){
                    $query->where('ecole_id', $adminUser->ecole_id);
                })
                ->get();
        
            // Ajoutez le message flash pour la création de la formation 
            $request->session()->flash('success', 'Formation créé avec succès !');

            foreach($doctorants as $doctorant){
                Mail::to($doctorant->user->email)->send(new MailFormation($formation, $doctorant));
            }
            return redirect()->route('admin.formations');
        }
    }

    public function deleteFormation($id){
        Formation::where('id', $id)->delete();
        session()->flash('success', 'Formation supprimée avec succès !');
        return redirect()->route('admin.formations');
    }

    public function index(){
        return view('admin.index');
    }
    
    public function doctorants()
    {
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {
            $doctorants = Doctorant::with('user')
            ->whereHas('user', function ($query) use ($adminUser){
                $query->where('ecole_id', $adminUser->ecole_id);
            })
            ->get();

            $ecole = Ecole::find($adminUser->ecole_id);
            $laboratoires = $ecole->laboratoires;

            $years = Year::all();

            $encadreurs = Encadreur::with('user')
            ->whereHas('user', function ($query) use ($adminUser){
                $query->where('ecole_id', $adminUser->ecole_id);
            })
            ->get();

            return view('admin.doctorants.index', compact("doctorants", "laboratoires", "years", "encadreurs"));
        }
    }

    public function encadreurs(){
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {
            $encadreurs = Encadreur::with('user')
            ->whereHas('user', function ($query) use ($adminUser){
                $query->where('ecole_id', $adminUser->ecole_id);
            })
            ->get();

            return view('admin.encadreurs.index', compact("encadreurs"));
        }
    }

    public function profilAdmin(){
        return view('admin.profil');
    }

    public function profilDoctorant($id){
        $doctorant = Doctorant::find($id);
        $activities = $doctorant->activities;
        return view('admin.doctorants.profile', compact('doctorant', 'activities'));
    }

    public function profilEncadreur($id){
        $encadreur = Encadreur::find($id);
        $doctorants = $encadreur->doctorants;
        return view('admin.encadreurs.profile', compact('encadreur', 'doctorants'));
    }

    public function createDoctorant()
    {    
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {
            $ecole = Ecole::find($adminUser->ecole_id);
            $laboratoires = $ecole->laboratoires;

            $years = Year::all();

            $encadreurs = Encadreur::with('user')
            ->whereHas('user', function ($query) use ($adminUser){
                $query->where('ecole_id', $adminUser->ecole_id);
            })
            ->get();

            return view('admin.doctorants.create', compact('encadreurs', 'laboratoires', 'years'));
        }
    }

    public function storeDoctorant(DoctorantRequest $request)
    {
        if (auth()->check()) {
            $userLoged = auth()->user();
            if($userLoged->role === "admin"){

            // On upload l'image dans "/storage/app/public/users"
            $chemin_image = $request->photo->store("users");
            $ecole_id = $userLoged->ecole_id;
        
            $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'photo' => $chemin_image,
            ]);

            $user->role ="doctorant";
            $password = bin2hex(random_bytes(4));
            $user->password = $password;
            $user->ecole_id = $ecole_id;
            $user->save();

            $laboratoire_id = $request->input('laboratoire_id');
            $laboratoire = Laboratoire::find($laboratoire_id)->name;

            $year_id = $request->input('year_id');
            $year = Year::find($year_id);

            $doctorant = new Doctorant([
            'matricule' => $request->input('matricule'),
            'specialite' => $request->input('specialite'),
            'encadreur_id' => $request->input('encadreur_id'),
            ]);
            $doctorant->vuser()->associate($user);
            $doctorant->laboratoire = $laboratoire;
            $doctorant->year = $year->year;
            // Assigner l'encadreur au doctorant s'il est spécifié
            $encadreurId = $request->input('encadreur_id');
        
            if($encadreurId){
            $doctorant->encadreur()->associate($encadreurId);
            }
            
            $doctorant->save();
            $year->doctorant_id = $doctorant->id;
            $year->save();

            $activitySeeder = new ActivitySeeder($doctorant->id, $year->id);
            $activitySeeder->run();

            $link = asset(route('index'));
            Mail::to($doctorant->user->email)->send(new MessageDoctorant($doctorant, $link, $password));
    
            $request->session()->flash('success', 'Doctorant créé avec succès !');
            return redirect()->route('admin.doctorant');
            }
        }
    }

    public function editDoctorant($id){
        $adminUser = Auth::user();
        if($adminUser->role == "admin"){
            $doctorant = Doctorant::find($id);

            $ecole = Ecole::find($adminUser->ecole_id);
            $laboratoires = $ecole->laboratoires;

            $years = Year::all();

            $encadreurs = Encadreur::with('user')
            ->whereHas('user', function ($query) use ($adminUser){
                $query->where('ecole_id', $adminUser->ecole_id);
            })
            ->get();
        }
        return view('admin.doctorants.create', compact('doctorant', 'laboratoires', 'years', 'encadreurs'));
    }

    public function updateDoctorant(UpdateDoctorantRequest $request, $id){
        $doctorant = Doctorant::find($id);
        $user = $doctorant->user;

        if ($request->has("photo")) {
            $rules["photo"] = 'bail|required|image';
        }
        $this->validate($request, $rules);

        if ($request->has("photo")) {
            Storage::delete($doctorant->user->photo);
            $chemin_image = $request->photo->store("users");
        }

        $laboratoire_id = $request->input('laboratoire_id');
        $laboratoire = Laboratoire::find($laboratoire_id)->name;

        $year_id = $request->input('year_id');
        $yearN = Year::find($year_id)->year;
        $year = Year::find($year_id);

        $encadreurId = $request->input('encadreur_id');

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "photo" => isset($chemin_image) ? $chemin_image : $doctorant->user->photo,
        ]);

        $doctorant->update([
            "matricule" => $request->matricule,
            "specialite" => $request->specialite,
            'year' => $yearN,
            'encadreur_id' => $encadreurId,
        ]);
        $doctorant->laboratoire = $laboratoire;
        $doctorant->save();

        $activitySeeder = new ActivitySeeder($doctorant->id, $year->id);
        $activitySeeder->run();

        $request->session()->flash('success', 'Doctorant mis à jour avec succès !');
        return redirect(route("admin.doctorant.profil", $doctorant->id));
    }

    public function createEncadreur()
    {
        return view('admin.encadreurs.create');
    }

    public function storeEncadreur(EncadreurRequest $request)
    {
        if(Auth::check() && Auth::user()->role === 'admin'){
            $userLoged = auth()->user();

        $chemin_image = $request->photo->store("users");
        $ecole_id = $userLoged->ecole_id;
        
         // Créer un nouvel utilisateur (Encadreur)
         $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'photo' => $chemin_image,
        ]);

        $user->role ="encadreur";
        $password = bin2hex(random_bytes(4));
        $user->password = $password;
        $user->ecole_id = $ecole_id;
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
        Mail::to($encadreur->user->email)->send(new MessageEncadreur($encadreur, $link, $password));

        $request->session()->flash('success', 'Encadreur créé avec succès !');
        return redirect()->route('admin.encadreur');
        }
    }

    public function editEncadreur($id){
        $adminUser = Auth::user();
        if($adminUser->role == "admin"){
            $encadreur = Encadreur::find($id);
        }
        return view('admin.encadreurs.create', compact('encadreur'));
    }

    public function updateEncadreur(UpdateEncadreurRequest $request, $id){
        $encadreur = Encadreur::find($id);
        $user = $encadreur->user;

        if ($request->has("photo")) {
            $rules["photo"] = 'bail|required|image';
        }
        $this->validate($request, $rules);

        if ($request->has("photo")) {
            Storage::delete($encadreur->user->photo);
            $chemin_image = $request->photo->store("users");
        }

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "photo" => isset($chemin_image) ? $chemin_image : $encadreur->user->photo,
        ]);

        $encadreur->update([
            "matricule" => $request->matricule,
            "specialite" => $request->specialite,
            "grade" => $request->grade,        
        ]);
        $encadreur->save();

        $request->session()->flash('success', 'Encadreur mis à jour avec succès !');
        return redirect(route("admin.encadreur.profil", $encadreur->id));
    }

    public function manageUsers(){
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

}