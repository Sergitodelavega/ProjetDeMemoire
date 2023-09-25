<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\These;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front.home.index');
    }

    public function theses(){
        $theses = These::all();
        $doctorants = Doctorant::all();
        return view('front.home.theses', compact('theses', 'doctorants'));
    }

    public function showTheses(){
        
    }

}
