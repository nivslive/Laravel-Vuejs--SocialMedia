<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Theme, Subject, Dashboard};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use App\Http\Services\ThemeService;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
class ThemeController extends Controller
{
    private ThemeService $service;

    public function __construct() {
        $this->service = new ThemeService;
    }

    public function user($id) {
        return $this->service->user($id);
    }

    public function post(Request $request) {
        return $this->service->post($request);
    }


    public function subject($id) {
        return Subject::with('messages')->where('id', $id)->paginate();
    }

    public function room($theme, $subject) {
        return Inertia::render('Room',
            $this->isLogged([
            'room' => $this->service->room($theme, $subject)
        ]));
    }

    public function rooms($slug) {
        return Inertia::render('Welcome',
            $this->isLogged([
                'variations' => $this->service->onlyThemeVariations(),
                'theme' => Theme::where('slug', '=', $slug)->first(),
                'id' => $this->service->rooms($slug),
        ]));
    }

}
