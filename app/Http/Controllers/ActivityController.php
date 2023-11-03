<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Comment;
use App\Models\Activity;
use App\Models\Doctorant;
use App\Mail\PointDeThese;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $user = auth()->user();
            if($user->role === "doctorant"){
                $id = $user->id;
                $doctorant = Doctorant::where('user_id', $id)->first();
                $activities = $doctorant->activities;
            }
        }
        return view('doctorant.activities.index', compact('activities', 'doctorant'));
    }

    public function historiques(){
        if (auth()->check()) {
            $user = auth()->user();
            if($user->role === "doctorant"){
                $id = $user->id;
                $doctorant = Doctorant::where('user_id', $id)->first();
                $activities = $doctorant->activities;
            }
        }
        return view('doctorant.activities.historiques', compact('activities', 'doctorant'));
    }

    public function validate_activity(Request $request, $id, $doctorant){
        $doctorant = Doctorant::find($doctorant);

        $action = $request->input('action');    
        $request->validate([
            'comment' => 'required|string',
        ]);

        if($action === 'valider'){
            $activity = Activity::find($id);

                $comments= new Comment;
                $comments->activity_id = $id;
                $comments->comment  .= "\n" . $request->input('comment');
                $comments->save();

            $activity->status = 'validée';
            $request->session()->flash('success', 'Activité validée avec succès !');

        } elseif($action === 'rejeter'){
            $activity = Activity::find($id);
            $activity->status = 'rejetée';

            $comments= new Comment;
            $comments->activity_id = $id;
            $comments->comment  .= "\n" . $request->input('comment');
            $comments->save();

            $request->session()->flash('fail', 'Activité rejetée avec succès !');
        }

        if($activity->title == "Préparation de la défense de thèse"){
            if($activity->doctorant->user->ecole_id){
                $admins = User::where('ecole_id', $activity->doctorant->user->ecole_id)->get();
                foreach($admins as $admin){
                    Mail::to($admin->email)->send(new PointDeThese($admin, $activity));
                }
            }
        }
        $activity->save();

        return redirect()->route('encadreur.doctorant.show', $doctorant->id);
    }

    public function histo($doctorant){
        $doctorant = Doctorant::find($doctorant);
        $activities = $doctorant->activities;

        return view('back.historiques', compact('doctorant', 'activities'));
    }

    public function reject_activity(Request $request, $id){
        
    }
}
