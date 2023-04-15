<?php

namespace Modules\Social\Theme\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Theme, Subject, Dashboard};
use App\Http\Services\ThemeService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
class ThemeController extends Controller
{
    private ThemeService $service;

    public function __construct() {
        $this->service = new ThemeService;
    }

    public function delete(Request $request, Theme $theme) {
        $theme->delete();
        return redirect()->back();
    }

    public function put(Request $request, Theme $theme) {
        $theme->update($request->all());
        return redirect()->back();
    }

    public function onlyBySlug($slug) {
        $theme = Theme::where('slug', $slug)->firstOrFail();
        return response()->json([
            'theme' => $theme
        ]);
    }

    public function onlyByLastWeek() {
        $theme = Theme::all();
        return response()->json([
            'theme' => $theme
        ]);

    }
    public function onlyById($id) {
        $theme = Theme::findOrFail($id);
        return response()->json([
            'theme' => $theme
        ]);
    }

    public function index() {
        $themes = Theme::all();
        return response()->json([
            'themes' => $themes
        ]);
    }
    public function allWithSubjects() {
        $themes = Theme::with('subjects')->get();
        return response()->json([
            'themes' => $themes
        ]);
    }

    public function post(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $theme = Theme::create($request->all());
        return redirect()->back();
    }
}
