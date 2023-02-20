<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Subject;
use Illuminate\Http\Request;
class MessageController extends Controller
{
    public function show($id) {
    }
    public function post(Request $request, $id) {
        return Chat::find($id)->subjects()->save(new Subject($request->toArray()));
    }
}
