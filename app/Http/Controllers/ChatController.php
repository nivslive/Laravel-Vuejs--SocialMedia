<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Reaction;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Str;
 

class ChatController extends Controller
{

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
    public function show($slug) {
        $subjects = Chat::find(Chat::where('slug', $slug)->get()->first()->id)->subjects()->withCount('messages')->orderBy('messages_count', 'desc')->get()->toArray();
        $subjects = array_map(function ($subject) {
            $subject['user'] = $this->user($subject['user_id']);
            $subject['messages'] = $this->messages($subject['id']);
            return $subject;
        }, $subjects);
        return $subjects;
    }

}
