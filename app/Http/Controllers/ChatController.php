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
        return Dashboard::all(10);
    }
    public function redis($data, $slug) {
        if(!Redis::exists('user:chat:'.$slug)):
            Redis::set('user:chat:'.$slug, json_encode($data));
        endif;
        $subjects = json_decode(Redis::get('user:chat:'.$slug));
        return $subjects;
    }
    public function show($slug) {
        $redis = false;
        $subjects = Chat::where('slug', $slug)->first()->subjects()->withCount('messages')->with('user')->orderBy('messages_count', 'desc')->get()->each(function ($subject) {
           // dd($subject::all()->toArray());
            //dd($subject::withCount('messages')->get()->toArray());
          $subject['user'] =  $subject::with('user')->first();
           // $subject = $subject::with('user')->withCount('messages')->orderBy('messages_count', 'desc')->get()->toArray();
            //     $subject['user'] = $this->user($subject['user_id']);
       //     $subject['messages'] = $this->messages($subject['id']);
            //$subject->messages()->get();
            // $subject->user()->get();
            return $subject;
        });
        return $redis ? $this->redis($subjects, $slug) : $subjects->toArray();
    }

}
