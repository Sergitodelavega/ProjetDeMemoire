<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function create()
{
    return view('activities.create');
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

    return redirect()->route('activites.index');
}

public function index()
{
    // Récupérez toutes les activités soumises
    $activities = Activity::latest()->get();

    return view('activities.index', compact('activities'));
}

}
