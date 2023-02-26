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

    public static function collectAndsplice($collection) {
        $collection = collect($collection->toArray());
        return $collection->sortByDesc('subjectsMessages')->splice(0, 5);
    }

    public static function sunMessages($id) {
        $subject = Subject::withCount('messages');
       return $subject->where('chat_id', $id)->offset(0)->limit(2)->get()->sum('messages_count');
    }

    public static function all() {
        $chat = Chat::all()->each( function ($chat) {
            $chat->subjectsMessages =  self::sunMessages($chat->id);
            $chat->messageWithMoreLikes = self::messageWithMoreLikes($chat->id);
        });
        return self::collectAndsplice($chat);
    }
}
