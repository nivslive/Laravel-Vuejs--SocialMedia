<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Support\Str;
class SubjectController extends Controller
{


    public function post() {
        $title = "oi amigos da rede globo";
        $theme =  new Subject(['user_id' => 2, 'theme_id' => 2, 'title' => $title, 'slug' => Str::of($title)->slug('-'), 'description' => 'fodase']);
        $theme->save();
    } 

    public function show($id) {
        $subject = Subject::find($id)->first();
        $theme = Subject::find($id)->theme()->first();
        $messages = Subject::find($id)->messages()->get();
        $data = [
            'theme' => $theme,
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
            'theme' => Theme::find($id)->first(),
            'subjects' => $subjects,
        ];
        return $data;*/
    }
}
