<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Formation;
use Illuminate\Http\Request;

class DoctorantController extends Controller
{
    public function home(){
        return view('doctorant.index');
    }

    public function profilDoctorant(){
        return view('doctorant.profil');
    }

    public function activity(){
        return view('doctorant.activity');
    }

    public function formation(){
        $formations = Formation::latest()->get();
        return view('doctorant.formation', compact('formations'));
    }

    public function messages(){
        if (auth()->check()) {
            // L'utilisateur est connecté, vous pouvez accéder à sa session
            $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
            if($user->role === "doctorant"){
                $id = $user->id;
                $doctorant = Doctorant::where('user_id', $id)->first();
                $encadreur = $doctorant->encadreur;
            }
            
        }


        return view('doctorant.messages', compact('encadreur'));
    }
}
