<?php


namespace Modules\Social\Chat\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use App\Http\Services\ChatService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private ChatService $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */

    public function __construct() {
        $this->service = new ChatService;
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
