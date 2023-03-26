<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class ChatRepository
{
    private bool $redisCheck = false;
    public function user($id) {
        return User::where('id', '=', $id)->get()->first()->toArray();
    }

    public function alreadyLiked($id) {
        $reaction =  Reaction::alreadyLiked(2, $id)->get()->toArray();
        return !empty($reaction) ? true : false;
    }

    public function messages($id): Array {
        $messages = Message::where('subject_id', $id)->orderBy('likes', 'DESC')->paginate(10)->toArray();
        $messages['data'] = array_map(function($message) {
            $message['user'] = $this->user($message['user_id']);
            $message['already_liked'] = $this->alreadyLiked($message['id']);
            return $message;
        }, $messages['data']);
        return $messages;
    }

    public function post(Request $request) {
        $title = "oi amigos da rede globo";
        $chat =  new Chat(['title' => $title, 'slug' => Str::of($title)->slug('-'), 'description' => 'fodase']);
        return $chat->save();
    }

    #private route
    public function room($chat, $subject) {
        $room = Subject::where('slug', $subject)->with(['user', 'messages.user'])->first();
        return $room;
    }

    #public route
    public function rooms($slug) {

        $rooms = Chat::with(['subjects' => function($query){
            $query->with(['user', 'messages'])->withCount('messages')->orderBy('messages_count', 'desc');
        }])->where('slug', '=', $slug)->get();

        return $rooms;
    }

}
