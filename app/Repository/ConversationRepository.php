<?php 

namespace App\Repository;
use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ConversationRepository{

    private $user;
    private $message;

    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function getConversations(int $userId){
        return $this->user->newQuery()
        ->select('name', 'id')
        ->where('id', '!=', $userId)
        ->get();
    }

    public function createMessage(string $content, int $from, int $to){
        return $this->message->newQuery()->create([
            'content' => $content,
            'from_id' => $from,
            'to_id' => $to,
            'created_at' => Carbon::now()
        ]);
    }

    public function getMessagesFor(int $from, int $to): Builder
    {
        return $this->message->newQuery()
        ->whereRaw("((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
        ->orderBy('created_at', 'DESC');
    }
}