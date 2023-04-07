<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Support\Str;
class SubjectController extends Controller
{


    public function post() {
        $title = "oi amigos da rede globo";
        $chat =  new Subject(['user_id' => 2, 'chat_id' => 2, 'title' => $title, 'slug' => Str::of($title)->slug('-'), 'description' => 'fodase']);
        $chat->save();
    } 

    public function show($id) {
        $subject = Subject::find($id)->first();
        $chat = Subject::find($id)->chat()->first();
        $messages = Subject::find($id)->messages()->get();
        $data = [
            'chat' => $chat,
            'subject' => $subject,
            'messages' => $messages
        ];
        return $data;
     /*   $subjects = array_map(function($subject) {
            $messages = Message::all()->where('subject_id', $subject['id'])->toArray();
            $subject['messages'] = $messages;
            return $subject;
        },$subjects);
        $data = [
            'chat' => Chat::find($id)->first(),
            'subjects' => $subjects,
        ];
        return $data;*/
    }
}
