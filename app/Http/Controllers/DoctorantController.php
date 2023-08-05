<?php

namespace App\Http\Controllers;

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
}
