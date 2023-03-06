<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Reaction;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
class MessageController extends Controller
{
    public function show($id) {
    }

    public function deslike($id) {
        Reaction::where('message_id', '=', $id)->delete();
        return Message::where('id', '=', $id)->decrement('likes');
    }
    public function like($id) {
        Reaction::create(['user_id' => Auth()->user()->id, 'subject_id' => 2, 'message_id' => $id, 'type' => 'like']);
        return Message::where('id', '=', $id)->increment('likes');
    }
    public function post(Request $request) {
        $message =  new Message(
            ['user_id' => Auth()->user()->id,
            'subject_id' => $request->subject,
            'message' => $request->message
        ]);
        $message->save();
        return $message;
    }
}
