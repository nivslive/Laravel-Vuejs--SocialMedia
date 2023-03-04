<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use App\Http\Services\ChatService;
class ChatController extends Controller
{
    private bool $redisCheck = false;
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

    public function room($slug) {
        return Inertia::render('Welcome', [
            'variations' => $this->service->onlyChatVariations(),
            'id' => $this->service->room($slug),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

}
