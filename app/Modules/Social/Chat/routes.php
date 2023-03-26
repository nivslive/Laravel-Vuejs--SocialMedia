<?php

use App\Modules\Social\Chat\Controller\ChatController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(ChatController::class)->group(function() {
    Route::get('/sefoda/{slug}', 'rooms');
});
