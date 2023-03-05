<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use App\Http\Services\ChatService;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
class ChatController extends Controller
{
    private ChatService $service;

    public function __construct() {
        $this->service = new ChatService;
    }

    public function user($id) {
        return $this->service->user($id);
    }

    public function post(Request $request) {
        return $this->service->post($request);
    }

    public function room($chat, $subject) {
        return Inertia::render('Room',
            $this->isLogged([
            'room' => $this->service->room($chat, $subject)
        ]));
    }

    public function rooms($slug) {
        return Inertia::render('Welcome',
            $this->isLogged([
                'variations' => $this->service->onlyChatVariations(),
                'id' => $this->service->rooms($slug),
        ]));
    }

}
