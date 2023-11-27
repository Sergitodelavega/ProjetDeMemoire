<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctorant;
use App\Models\Encadreur;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use App\Http\Requests\StoreMessage;
use App\Http\Requests\StoreMessageRequest;
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
            'users' => $this->r->getConversations($this->auth->user()->id),
            'unread' => $this->r->unreadCount($this->auth->user()->id)
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
        $me = $this->auth->user();
        $messages = $this->r->getMessagesFor($me->id, $user->id)->paginate(20);
        $unread = $this->r->unreadCount($this->auth->user()->id);
        if(isset($unread[$user->id])){
            $this->r->readAllFrom($user->id, $me->id);
            unset($unread[$user->id]);
        }
        return view('encadreur.show', [
            'users' => $this->r->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages' => $messages,
            'unread' => $unread
        ]);
    }

    public function store(User $user, StoreMessageRequest $request){
        $this->r->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );

        return redirect(route('encadreur.messages.show', $user));
    }

}

