<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Message, Reaction, Subject, Chat};
class Dashboard
{
    use HasFactory;
    public static function messageWithMoreLikes($id) {
        return Subject::find(2)->messages()->orderBy('likes', 'DESC')->get()->toArray()[0];
    }

    public static function collectAndsplice($collection, $limit = 5) {
        $collection = collect($collection->toArray());
        return $collection->sortByDesc('subjectsMessages')->splice(0, $limit);
    }

    public static function sunMessages($id) {
        $subject = Subject::withCount('messages');
       return $subject->where('chat_id', $id)->offset(0)->limit(2)->get()->sum('messages_count');
    }
    #broked
    /*public static function only(Array $only) {
        return self::all();
    }*/
    public static function all($limit = 5) {
        //\DB::enableQueryLog();
      /*  $chat = Chat::all()->each( function ($chat) {
            $chat->subjectsMessages =  self::sunMessages($chat->id);
            $chat->messageWithMoreLikes = self::messageWithMoreLikes($chat->id);
        });*/

        $chat = Chat::with(['subjects' => function($query) {
            $query->withCount('messages')->orderBy('messages_count', 'asc');
        }]);


        $chat = collect($chat->get()->toArray())->map(function($_) {
            $_['allsums'] = collect($_['subjects'])->sum('messages_count');
            return $_;
        })->sortByDesc('allsums');
        return $chat;

        //dd(\DB::getQueryLog());
        //return self::collectAndsplice($chat, $limit);
    }
}
