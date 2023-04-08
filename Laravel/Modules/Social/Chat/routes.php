<?php

use Modules\Social\Chat\Controllers\ChatController as Chat;
use Modules\Social\Chat\Controllers\WithSubjectController as Subject;
use Modules\Social\Chat\Controllers\PageController as Page;
use Modules\Social\Chat\Controllers\DashboardController as Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('api/chat')->group(function() {

    Route::apiResource('/', Chat::class)->parameter('chat', 'id');

    #Route::prefix('/with-subjects')->controller(Subject::class)->group(function(){
    #    Route::get('/', 'index');
   # });
    Route::prefix('/with-subjects')->group(function() {
        Route::apiResource('chat.subjects', Subject::class);
    });

    Route::prefix('only')->controller(Chat::class)->group(function() {
        $methodPrefix = 'onlyBy';
        Route::get('/last-week', $methodPrefix.'LastWeek');
        Route::get('/id', $methodPrefix.'Id');
        Route::get('/slug', $methodPrefix.'Slug');
    });

});

Route::controller(Dashboard::class)->prefix('test/')->group(function()  {
    Route::get('/topofday', 'topOfDay');
});

Route::middleware(['web'])->controller(Page::class)->prefix('chat/')->group(function() {
    Route::get('/{slug}', 'rooms');
});
