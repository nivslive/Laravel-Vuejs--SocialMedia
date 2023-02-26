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
        Reaction::create(['user_id' => 2, 'subject_id' => 2, 'message_id' => $id, 'type' => 'like']);
        return Message::where('id', '=', $id)->increment('likes');
    }
    public function post() {
        $title = "oi amigos da rede globo";
        $message =  new Message(['user_id' => 2, 'subject_id' => 2, 'message' => 'mensagem']);
        $message->save();
        // params: Request $request, $id
        /*  $idd = ['user_id' => 2];
        $subject_id = ['subject_id' => 2];
        $request = array_merge($idd, $request->all());
        $request = array_merge($subject_id, $request);
        $message = new Message($request);
        $message->save();*/
        return $message;
        //return Chat::find($id)->subjects()->save(new Subject($request->toArray()));
    }
}
