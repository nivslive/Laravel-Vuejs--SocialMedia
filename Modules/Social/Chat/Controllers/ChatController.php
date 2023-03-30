<?php

namespace Modules\Social\Chat\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use App\Http\Services\ChatService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
class ChatController extends Controller
{
    private ChatService $service;

    public function __construct() {
        $this->service = new ChatService;
    }

    public function delete(Request $request, Chat $chat) {
        $chat->delete();
        return redirect()->back();
    }

    public function put(Request $request, Chat $chat) {
        $chat->update($request->all());
        return redirect()->back();
    }

    public function onlyBySlug($slug) {
        $chat = Chat::where('slug', $slug)->firstOrFail();
        return response()->json([
            'chat' => $chat
        ]);
    }

    public function onlyByLastWeek() {
        $chat = Chat::all();
        return response()->json([
            'chat' => $chat
        ]);

    }
    public function onlyById($id) {
        $chat = Chat::findOrFail($id);
        return response()->json([
            'chat' => $chat
        ]);
    }

    public function all() {
        $chats = Chat::all();
        return response()->json([
            'chats' => $chats
        ]);
    }
    public function allWithSubjects() {
        $chats = Chat::with('subjects')->get();
        return response()->json([
            'chats' => $chats
        ]);
    }

    public function post(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $chat = Chat::create($request->all());
        return redirect()->back();
    }
}
