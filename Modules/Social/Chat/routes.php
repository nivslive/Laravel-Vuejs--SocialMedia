<?php

use Modules\Social\Chat\Controller\ChatController;
use Modules\Social\Chat\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(ChatController::class)->prefix('chat/api')->group(function() {

    Route::get('/', 'all');
    Route::post('/', 'post');
    Route::put('/', 'update');
    Route::delete('/', 'delete');

    Route::get('/i/{id}', 'onlyById');
    Route::get('/s/{slug}', 'onlyBySlug');


    Route::prefix('with-subjects')->group(function(){
        $methodPrefix = 'WithSubjects';
        Route::get('/', 'all' . $methodPrefix);
        Route::post('/', 'post' . $methodPrefix);
    });
});

Route::controller(PageController::class)->prefix('chat/')->group(function() {
    Route::get('/{slug}', 'rooms');
});
