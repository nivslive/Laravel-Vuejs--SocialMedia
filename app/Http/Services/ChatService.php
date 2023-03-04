<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Chat, Subject, Dashboard};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class ChatService
{
    private bool $redisCheck = false;
    private ChatRepository $repository;
    public function __construct() {
        $this->repository = new ChatRepository;
    }
    public function user($id) {
        return $this->repository->user($id);
    }

    public function alreadyLiked($id) {
        return $this->alreadyLiked($id);
    }

    public function messages($id): Array {
        return $this->messages($id);
    }

    public function post(Request $request) {
        return $this->post($request);
    }

    public function onlyChatVariations() {
        return $this->onlyChatVariations();
    }

    public function room($slug) {
        return $this->repository->show($slug);
    }

}
