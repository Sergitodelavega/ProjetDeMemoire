<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Comment;
use App\Models\Activity;
use App\Models\Doctorant;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activity_submit($id)
{
    $activity = Activity::find($id);
    // $files=File::where('activity_id', $id)->get();
    // $comment=Comment::where('activity_id', $id)->first();

    return view('doctorant.activities.create', compact('activity'));
}

public function submit($id, Request $request){
    $request->validate([
        'comment' => 'required|string',
    ]);

    $activity = Activity::find($id);
    $activity->comment = $request->input('comment');
    $activity->status= "en attente";
    $activity->save();

    return redirect()->route('doctorant.activity.index')->with('success',"Activité soumis avec succès");
}

public function show($id){
    $activity = Activity::find($id);
    $comments = Comment::where('activity_id', $id)->first();
    return view('doctorant.activities.show', compact('activity', 'comments'));
}

public function store(Request $request, Activity $activity)
{

    // Validez les données soumises par le doctorant
    $request->validate([
        'comment' => 'required|string',
    ]);

    $activity->comment = $request->input('comment');
    $activity->status = 'en attente';
    $activity->save();

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

public function validate_activity(Request $request, $id){
    // Validez les données soumises par le doctorant
    $request->validate([
        'comment' => 'required|string',
    ]);

    $comments= new Comment;
    $comments->activity_id = $id;
    $comments->comment = $request->input('comment');
    $comments->save();

    $activity = Activity::find($id);
    $activity->status = 'validée';
    $activity->save();

    return redirect()->route('encadreur.doctorant.index')->with('success',"Activité validée avec succès!");
}

public function reject_activity(Request $request, $id){

}
}
