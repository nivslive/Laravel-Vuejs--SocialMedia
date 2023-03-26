<?php

namespace Modules\Social\Chat\Controller;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use App\Http\Services\ChatService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
class WithSubjectController extends Controller
{
    private ChatService $service;

    public function __construct() {
        $this->service = new ChatService;
    }

    public function all() {
        $chats = Chat::with('subjects')->get();
        return response()->json([
            'chats' => $chats
        ]);
    }
}
