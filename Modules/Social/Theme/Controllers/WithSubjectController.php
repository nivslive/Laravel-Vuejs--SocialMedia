<?php

namespace Modules\Social\Theme\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Theme, Subject, Dashboard};
use App\Http\Services\ThemeService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
class WithSubjectController extends Controller
{
    private ThemeService $service;

    public function __construct() {
        $this->service = new ThemeService;
    }

    public function all() {
        $themes = Theme::with('subjects')->get();
        return response()->json([
            'themes' => $themes
        ]);
    }
}
