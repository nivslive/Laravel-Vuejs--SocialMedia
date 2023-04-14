<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ThemeController;

Route::get('/room/{slug}', [ThemeController::class, 'rooms'])->name('rooms');
Route::get('/room/{theme}/{subject}', [ThemeController::class, 'room'])->name('room');
Route::get('/subject/by-id/{subject}', [ThemeController::class, 'subject'])->name('subject');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
