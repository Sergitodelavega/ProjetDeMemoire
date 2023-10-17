<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Doctorant;
use App\Models\Encadreur;
use Illuminate\Http\Request;

class EncadreurController extends Controller
{

    public function index(){
        return view('back.home.index');
    }

    public function home(){
        return view('encadreur.index');
    }

    public function profilEncadreur(){
        return view('encadreur.profil');
    }

    public function indexDoctorant(){
        if (auth()->check()) {
            // L'utilisateur est connecté, vous pouvez accéder à sa session
            $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
            if($user->role === "encadreur"){
                $id = $user->id;
                $encadreur = Encadreur::where('user_id', $id)->first();
                $doctorants = $encadreur->doctorants;
            }
        }

        return view('encadreur.doctorant', compact('doctorants'));
    }

    public function showDoctorant($id){
        $doctorant = Doctorant::find($id);
        $activities = $doctorant->activities;
        return view("encadreur.show_doctorant", compact('doctorant', 'activities'));
    }

    public function publications(){
        return view('encadreur.publications');
        // abort('404', message:"User not found");
    }

    public function showActivity($id){
        
        $activity = Activity::find($id);
        $doctorant = $activity->doctorant;
        return view('encadreur.show_activity', compact('activity', 'doctorant'));
    }
}
