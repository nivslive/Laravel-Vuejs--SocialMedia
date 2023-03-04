<?php

namespace App\Http\Services;

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


    public function onlyChatVariations() {
        $data = Dashboard::all(10);
        return $this->redisCheck ? $this->redis($data, 'all', 'subject') : $data;
    }
    public function redis($data, $slug, $part = 'chat') {
        if(!Redis::exists('user:'.$part.':'.$slug)):
            Redis::set('user:'.$part.':'.$slug, json_encode($data));
        endif;
        $subjects = json_decode(Redis::get('user:'.$part.':'.$slug));
        return $subjects;
    }
    public function show($slug) {
        //\DB::enableQueryLog();
        /*$subjects = Chat::where('slug', $slug)->first()->subjects()->withCount('messages')->orderBy('messages_count', 'desc')->get()->each(function ($subject) {
            $subject['user'] =  User::select('name')->where('id', $subject->user_id)->first();
            return $subject;
        });*/
        $subjects = Chat::with(['subjects' => function($query){
            $query->withCount('messages')->orderBy('messages_count', 'desc');
        },'subjects.user'])->where('slug', '=', $slug)->get();
       // dd(\DB::getQueryLog());
        //dd(Chat::where('slug', $slug)->first()->subjects()->get()->toArray());
        return $this->redisCheck ? $this->redis($subjects, $slug) : $subjects->toArray();
    }

}
