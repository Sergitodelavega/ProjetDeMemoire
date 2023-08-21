<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
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
        $doctorants = Doctorant::latest()->get();
        return view('encadreur.doctorant', compact('doctorants'));
    }

    public function showDoctorant($id){
        $doctorants = Doctorant::all();
        $doctorant = Doctorant::find($id);
        return view("encadreur.show_doctorant", compact('doctorants', 'doctorant'));
    }

    public function publications(){
        return view('encadreur.publications');
    }
}
