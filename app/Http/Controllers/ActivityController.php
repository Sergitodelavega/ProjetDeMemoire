<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Comment;
use App\Models\Activity;
use App\Models\Doctorant;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activity_submit($id)
{

    $activity = Activity::find($id);
    $files=File::where('activity_id', $id)->get();
    return view('doctorant.activities.create', compact('activity'));
}

public function submit($id, Request $request){
    $request->validate([
        'comment' => 'required|string',
        'files.*' => 'required',
    ]);

    $activity = Activity::find($id);
    $activity->comment = $request->input('comment');
    $activity->status= "en attente";
    $activity->save();

    $uploadedFiles = $request->file('files');
    
    foreach($uploadedFiles as $uploadedFile) {
       
        $filename = 'doc'.date('Ymd-His').'_'. uniqid().'.'.$uploadedFile->getClientOriginalExtension();
        
        $uploadedFile->move('upload/files', $filename);
        // Créer un nouvel enregistrement dans la table "File"
        $file = new File([
            'activity_id' => $activity->id,
            'link' => $filename,
        ]);
        $file->save();
    }
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
    if (auth()->check()) {
        $user = auth()->user(); // Récupérer l'objet User de l'utilisateur connecté
        if($user->role === "doctorant"){
            $id = $user->id;
            $doctorant = Doctorant::where('user_id', $id)->first();
            $activities = $doctorant->activities;
        }
    }
    return view('doctorant.activities.index', compact('activities', 'doctorant'));
}

public function validate_activity(Request $request, $id, $doctorant){
    $doctorant = Doctorant::find($doctorant);

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

    return redirect()->route('encadreur.doctorant.show', $doctorant->id)->with('success',"Activité validée avec succès!");
}

public function reject_activity(Request $request, $id){

}
}
