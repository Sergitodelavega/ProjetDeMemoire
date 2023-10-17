<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctorant;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorantController extends Controller
{
    public function showEncadreur($id){
        $user = User::find($id);
        return view('doctorant.encadreur', compact('user'));
    }
    public function profilDoctorant(){
        return view('doctorant.profil');
    }

    public function formation(){
        $doctorantUser = Auth::user();
        if($doctorantUser->role == "doctorant")
        {
            $formations = Formation::where('ecole_id', $doctorantUser->ecole_id)->get();
        }
        return view('doctorant.formation', compact('formations'));
    }

}
