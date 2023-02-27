<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

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


    public function onlyChatVariations() {
        $redis = true;
        $data = Chat::select('title', 'slug')->orderBy('subjects_all_messages_count', 'desc')->skip(0)->take(10)->get()->toArray();
        dd($data);
        return $redis ? $this->redis($data, 'all', 'subject') : $data;
    }
    public function redis($data, $slug, $part = 'chat') {
        if(!Redis::exists('user:'.$part.':'.$slug)):
            Redis::set('user:'.$part.':'.$slug, json_encode($data));
        endif;
        $subjects = json_decode(Redis::get('user:'.$part.':'.$slug));
        return $subjects;
    }
    public function show($slug) {
        $redis = true;
       /* $subjects = Chat::where('slug', $slug)->first()->subjects()->withCount('messages')->orderBy('messages_count', 'desc')->get()->each(function ($subject) {
            $subject['user'] =  User::select('name')->where('id', $subject->user_id)->first();
            return $subject;
        });
        return $redis ? $this->redis($subjects, $slug) : $subjects->toArray();*/
    }

}
