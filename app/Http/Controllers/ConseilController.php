<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConseilController extends Controller
{
    public function profil(){
        return view('conseil.profil');
    }

    public function home(){
        return view('conseil.index');
    }
}
