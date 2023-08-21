<?php

namespace App\Http\Controllers;

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
}
