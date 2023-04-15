<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use App\Http\Repositories\ThemeRepository;
use App\Http\Services\DashboardService;
class ThemeService extends Service
{

    private ThemeRepository $repository;
    public function __construct() {
        #user
        #$this->user = Auth()->user();

        #repository
        $this->repository = new ThemeRepository;

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

    public function onlyThemeVariations() {
        $data = $this->dashboard->all();
        return $this->redisCheck ? $this->redis($data, 'all', 'subject') : $data;
    }
    public function room($theme, $subject) {
        $data = $this->repository->room($theme, $subject);
        return $this->redisCheck ? $this->redis($data, $slug) : $data->toArray();
    }
    public function rooms($slug) {
        $data = $this->repository->rooms($slug);
        return $this->redisCheck ? $this->redis($data, $slug) : $data->toArray();
    }

}
