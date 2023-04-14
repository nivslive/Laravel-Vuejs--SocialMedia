<?php


namespace Modules\Social\Theme\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Theme, Subject, Dashboard};
use App\Http\Services\ThemeService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private ThemeService $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */

    public function __construct() {
        $this->service = new ThemeService;
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
