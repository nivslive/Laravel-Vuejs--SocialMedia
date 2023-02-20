<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
class ChatController extends Controller
{
    public function show($id) {
        $subjects = Chat::find($id)->subjects()->get()->toArray();
        $subjects = array_map(function ($subject) {
            $subject['messages'] = Message::where('subject_id', $subject['id'])->get()->toArray();
            return $subject;
        }, $subjects);
        return $subjects;
    }

}
