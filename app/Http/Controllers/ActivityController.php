<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Doctorant;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function create()
{
    return view('doctorant.activities.create');
}

public function store(Request $request)
{
    // Validez les données soumises par le doctorant

    $activite = new Activity([
        'titre' => $request->input('titre'),
        'description' => $request->input('description'),
        'valide' => false, // Par défaut, l'activité est en attente de validation
    ]);

    // Associez l'activité au doctorant actuellement authentifié
    auth()->user()->activities()->save($activite);

    return redirect()->route('doctorant.activites.index');
}

public function index()
{
    // Récupérez toutes les activités soumises
    
    if (auth()->check()) {
        // L'utilisateur est connecté, vous pouvez accéder à sa session
        $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
        if($user->role === "doctorant"){
            $id = $user->id;
            $doctorant = Doctorant::where('user_id', $id)->first();
            $activities = $doctorant->activities;
        }
        
    }

    return view('doctorant.activities.index', compact('activities'));
}

}
