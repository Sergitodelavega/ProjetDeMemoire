<?php

namespace App\Http\Controllers;

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
        return view('encadreur.doctorant');
    }
}
