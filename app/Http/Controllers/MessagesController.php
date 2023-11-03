<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctorant;
use App\Models\Encadreur;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use App\Repository\ConversationRepository;

class MessagesController extends Controller
{
    private $r;
    private $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth){
        $this->r = $conversationRepository;
        $this->auth = $auth;
    }

    public function index(){
        // if (auth()->check()) {
        //     $user = auth()->user();
        //     if($user->role === "doctorant"){
        //         $id = $user->id;
        //         $doctorant = Doctorant::where('user_id', $id)->first();
        //         $encadreur = $doctorant->encadreur;

        //         return view('doctorant.messages', compact('encadreur'));
        //     }
        //     elseif($user->role === "encadreur"){
        //         $id = $user->id;
        //         $encadreur = Encadreur::where('user_id', $id)->first();
        //         $doctorants = $encadreur->doctorants;

        //         return view('encadreur.messages', compact('doctorants'));
        //     }
        //     else{
        //         return null;
        //     }
            
        // }   
        return view('encadreur.messages', [
            'users' => $this->r->getConversations($this->auth->user()->id)
        ]);
    }

    public function show(User $user){
        // if (auth()->check()) {
        //     $user = auth()->user(); 
        //     if($user->role === "doctorant"){
        //         $id = $user->id;
        //         $doctorant = Doctorant::where('user_id', $id)->first();
        //         $encadreur = $doctorant->encadreur;

        //         return view('doctorant.show', compact('encadreur'));
        //     }
        //     elseif($user->role === "encadreur"){
        //         $id = $user->id;
        //         $encadreur = Encadreur::where('user_id', $id)->first();
        //         $doctorants = $encadreur->doctorants;
        //         $doctorant = Doctorant::find($ids);

        //         return view('encadreur.show', compact('doctorants', 'doctorant'));
        //     }
        //     else{
        //         return null;
        //     }
            
        // }
        
        return view('encadreur.show', [
            'users' => $this->r->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages' => $this->r->getMessagesFor($this->auth->user()->id, $user->id)->get()->reverse()
        ]);
    }

    public function store(User $user, Request $request){
        $this->r->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );

        return redirect(route('encadreur.messages.show', $user));
    }
}

