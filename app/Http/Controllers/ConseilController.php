<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Ecole;
use Illuminate\Http\Request;

class ConseilController extends Controller
{
    public function profil(){
        return view('conseil.profil');
    }

    public function home(){
        return view('conseil.index');
    }

    public function ecoles(){
        $ecoles = Ecole::all();
        return view('conseil.ecoles', compact('ecoles'));
    }

    public function doctorants(){
        $doctorants = Doctorant::all();
        return view('conseil.doctorants', compact('doctorants'));
    }

    public function encadreurs(){
        
    }
}
