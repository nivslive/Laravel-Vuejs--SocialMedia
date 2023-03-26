<?php

use Modules\Social\Message\Controller\MessageController;
use Modules\Social\Chat\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(MessageController::class)->prefix('subject/api')->group(function() {

    Route::get('/', 'all');
    Route::post('/', 'post');
    Route::put('/', 'update');
    Route::delete('/', 'delete');

});

Route::controller(PageController::class)->prefix('subject/')->group(function() {

});
