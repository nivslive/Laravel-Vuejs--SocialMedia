<?php

namespace App\Http\Controllers;
use App\Models\Subject;
class SubjectController extends Controller
{
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
