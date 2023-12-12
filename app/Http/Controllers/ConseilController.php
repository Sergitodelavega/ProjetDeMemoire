<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ecole;
use App\Models\Doctorant;
use App\Models\Encadreur;
use App\Models\Laboratoire;
use App\Models\These;
use Illuminate\Http\Request;

class ConseilController extends Controller
{
    public function profil(){
        return view('conseil.profil');
    }

    public function home(){
        $ecoles = Ecole::all();
        $doctorants = Doctorant::all();
        $encadreurs = Encadreur::all();
        $thesesP = These::where('status', 'en cours')->get();
        $thesesT = These::where('status', 'terminée')->get();
        $laboratoires = Laboratoire::all();
        return view('conseil.stats', compact('ecoles', 'doctorants', 'encadreurs', 'thesesP', 'laboratoires', 'thesesT'));
    }

    public function ecoles(){
        $ecoles = Ecole::all();
        return view('conseil.index', compact('ecoles'));
    }

    public function showEcoles($id){
        $ecoles = Ecole::all();
        $ecole = Ecole::find($id);

        $doctorants = User::where('ecole_id', $id)
            ->where('role', 'doctorant')
            ->get();

        $encadreurs = User::where('ecole_id', $id)
            ->where('role', 'encadreur')
            ->get();

        $laboratoires = Laboratoire::where('ecole_id', $id)->get();
        $theses = These::where('ecole_id', $id)->get();
        $thesesP = These::where('status', 'en cours')->get();
        $thesesT = These::where('status', 'terminée')->get();
        
        return view('conseil.show', compact('ecoles', 'ecole', 'doctorants', 'encadreurs', 'laboratoires', 'theses', 'thesesP', 'thesesT'));
    }
}
