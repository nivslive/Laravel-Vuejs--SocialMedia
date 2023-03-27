<?php

use Modules\Social\Message\Controller\MessageController;
use Modules\Social\Chat\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(MessageController::class)->prefix('api/message')->group(function() {

    Route::get('/', 'all');
    Route::post('/', 'create');
    Route::put('/', 'update');
    Route::delete('/', 'delete');

});

Route::controller(PageController::class)->prefix('message/')->group(function() {

});
