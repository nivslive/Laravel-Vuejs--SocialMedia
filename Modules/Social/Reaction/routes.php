<?php

use Modules\Social\Reaction\Controller\ReactionController;
#use Modules\Social\Reaction\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(ReactionController::class)->prefix('api/reaction')->group(function() {

    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::put('/', 'update');
    Route::delete('/', 'delete');

});
