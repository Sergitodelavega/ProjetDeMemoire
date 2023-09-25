<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Encadreur;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(){
        if (auth()->check()) {
            // L'utilisateur est connecté, vous pouvez accéder à sa session
            $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
            if($user->role === "doctorant"){
                $id = $user->id;
                $doctorant = Doctorant::where('user_id', $id)->first();
                $encadreur = $doctorant->encadreur;

                return view('doctorant.messages', compact('encadreur'));
            }
            elseif($user->role === "encadreur"){
                $id = $user->id;
                $encadreur = Encadreur::where('user_id', $id)->first();
                $doctorants = $encadreur->doctorants;

                return view('encadreur.messages', compact('doctorants'));
            }
            else{
                return null;
            }
            
        }   
    }

    public function show($ids){
        if (auth()->check()) {
            // L'utilisateur est connecté, vous pouvez accéder à sa session
            $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
            if($user->role === "doctorant"){
                $id = $user->id;
                $doctorant = Doctorant::where('user_id', $id)->first();
                $encadreur = $doctorant->encadreur;

                return view('doctorant.show', compact('encadreur'));
            }
            elseif($user->role === "encadreur"){
                $id = $user->id;
                $encadreur = Encadreur::where('user_id', $id)->first();
                $doctorants = $encadreur->doctorants;
                $doctorant = Doctorant::find($ids);

                return view('encadreur.show', compact('doctorants', 'doctorant'));
            }
            else{
                return null;
            }
            
        }
    }

    }

