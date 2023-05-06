<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Theme, Subject, Dashboard};
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class ThemeRepository
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
        $theme =  new Theme(['title' => $title, 'slug' => Str::of($title)->slug('-'), 'description' => 'fodase']);
        return $theme->save();
    }

    #private route
    public function room($theme, $subject) {
        $room = Subject::where('slug', $subject)->with(['photo', 'user', 'links', 'messages' => function($query) {
            $query->withCount('reactions');
            $query->orderBy('reactions_count', 'desc');
        }, 'messages.user', 'messages.replies' => function($query){
            $query->with('user');
        }])->first();
        
        dd($room->toArray());
        return $room;
    }


    public function countAllReactions($rooms) {
        $count = 0;
        foreach($rooms->toArray() as $room) {
            foreach($room['subjects'] as $subject) {
                foreach($subject['messages'] as $message) {
                    $count += $message['reactions_count'];
                }
            }
        }
        return $count;
    }

    #public route
    public function rooms($slug) {
       $now = Carbon::now();
       $startOfWeek = $now->startOfWeek();
       $endOfWeek = $now->endOfWeek();
       #$rooms = Theme::with(['subjects' => function($query)  use ($startOfWeek, $endOfWeek){
        #    $query->with(['user', 'messages'])
        #    ->withCount('messages')
        #    //->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        #    ->orderBy('messages_count', 'desc');
        #}])->where('slug', '=', $slug)->get();
        $rooms = Theme::with(['subjects' => function($query) use ($startOfWeek, $endOfWeek) {
            $query->with(['user', 'messages' => function($query) {
                $query->withCount('reactions');
                $query->with('replies');
                $query->orderBy('reactions_count', 'desc');
            }])
            ->withCount('messages')
            ->orderBy('messages_count', 'desc');
        }])->withCount('subjects')->where('slug', '=', $slug)->get();
        //dd($this->countAllReactions($rooms));
        #dd($rooms->toArray());
        # EXAMPLE FOR TESTING LATE
       /* $rooms = Theme::with(['subjects' => function($query) use ($startOfWeek, $endOfWeek) {
            $query->with(['user', 'messages' => function($query) {
                $query->orderByDesc('likes_count')->take(3);
            }])
            ->withCount('messages')
            ->orderBy('messages_count', 'desc');
        }])->where('slug', '=', $slug)->get();*/

        return $rooms;
    }

}
