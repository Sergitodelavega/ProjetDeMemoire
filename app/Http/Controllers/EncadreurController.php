<?php

namespace App\Http\Controllers;

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
        $doctorants = Doctorant::all();
        $doctorant = Doctorant::find($id);
        return view("encadreur.show_doctorant", compact('doctorants', 'doctorant'));
    }

    public function publications(){
        return view('encadreur.publications');
        // abort('404', message:"User not found");
    }
}
