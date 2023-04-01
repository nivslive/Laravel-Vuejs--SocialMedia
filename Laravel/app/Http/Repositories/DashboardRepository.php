<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Message, Reaction, Subject, Chat};

class DashboardRepository
{
    public function messageWithMoreLikes($id) {
        return Subject::find(2)
            ->messages()
            ->orderBy('likes', 'DESC')
            ->get();
    }

    public function sunMessages($id) {
        return Subject::withCount('messages')
            ->where('chat_id', $id)
            ->offset(0)
            ->limit(2)
            ->get()
            ->sum('messages_count');
    }

    public function all($limit = 5) {

        $chat = Chat::with(['subjects' => function($query) {
            $query->withCount('messages')
            ->orderBy('messages_count', 'desc');
        }]);

      $chat = array_values(collect($chat->get()->toArray())->map(function($_, $k) {
            $_['allsums'] = collect($_['subjects'])->sum('messages_count');
            return $_;
        })->sortByDesc('allsums')->toArray());
        //$chat = $chat->sort();
        return $chat;
    }
}
