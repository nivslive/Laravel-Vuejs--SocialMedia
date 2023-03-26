<?php

use Modules\Social\Chat\Controller\ChatController as Chat;
use Modules\Social\Chat\Controller\WithSubjectController as Subject;
use Modules\Social\Chat\Controller\PageController as Page;
use Illuminate\Support\Facades\Route;

Route::prefix('chat/api')->group(function() {

    Route::controller(Chat::class)->group(function() {
        Route::get('/', 'all');
        Route::post('/', 'post');
        Route::put('/', 'update');
        Route::delete('/', 'delete');
    });

    Route::prefix('/with-subjects')->controller(Subject::class)->group(function(){
        Route::get('/', 'all');
        Route::post('/', 'post');
    });

    Route::prefix('only')->controller(Chat::class)->group(function() {
        $methodPrefix = 'onlyBy';
        Route::get('/last-week', $methodPrefix.'LastWeek');
        Route::get('/id', $methodPrefix.'Id');
        Route::get('/slug', $methodPrefix.'Slug');
    });

});



Route::controller(Page::class)->prefix('chat/')->group(function() {
    Route::get('/{slug}', 'rooms');
});
