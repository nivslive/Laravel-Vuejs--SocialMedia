<?php

namespace Modules\Social\Chat\Controller;

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
                'chat' => Chat::where('slug', '=', $slug)->first(),
                'id' => $this->service->rooms($slug),
        ]));
    }

}
