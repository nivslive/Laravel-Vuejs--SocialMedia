<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use App\Http\Repositories\ChatRepository;
use App\Http\Services\DashboardService;
class ChatService extends Service
{

    private ChatRepository $repository;

    public function __construct() {
        #repository
        $this->repository = new ChatRepository;

        #services
        $this->dashboard = new DashboardService;
    }
    public function user($id) {
        return $this->repository->user($id);
    }

    public function alreadyLiked($id) {
        return $this->repository->alreadyLiked($id);
    }

    public function messages($id): Array {
        return $this->repository->messages($id);
    }

    public function post(Request $request) {
        return $this->repository->post($request);
    }

    public function onlyChatVariations() {
        $data = $this->dashboard->all();
        return $this->redisCheck ? $this->redis($data, 'all', 'subject') : $data;
    }
    public function room($chat, $subject) {
        $data = $this->repository->room($chat, $subject);
        return $this->redisCheck ? $this->redis($data, $slug) : $data->toArray();
    }
    public function rooms($slug) {
        $data = $this->repository->rooms($slug);
        return $this->redisCheck ? $this->redis($data, $slug) : $data->toArray();
    }

}
