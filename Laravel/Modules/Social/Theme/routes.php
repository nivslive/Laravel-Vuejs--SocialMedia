<?php

use Modules\Social\Theme\Controllers\ThemeController as Theme;
use Modules\Social\Theme\Controllers\WithSubjectController as Subject;
use Modules\Social\Theme\Controllers\PageController as Page;
use Modules\Social\Theme\Controllers\DashboardController as Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('api/theme')->group(function() {

    Route::apiResource('/', Theme::class)->parameter('theme', 'id');

    #Route::prefix('/with-subjects')->controller(Subject::class)->group(function(){
    #    Route::get('/', 'index');
   # });
    Route::prefix('/with-subjects')->group(function() {
        Route::apiResource('theme.subjects', Subject::class);
    });

    Route::prefix('only')->controller(Theme::class)->group(function() {
        $methodPrefix = 'onlyBy';
        Route::get('/last-week', $methodPrefix.'LastWeek');
        Route::get('/id', $methodPrefix.'Id');
        Route::get('/slug', $methodPrefix.'Slug');
    });

});

Route::controller(Dashboard::class)->prefix('/topof')->group(function()  {
    Route::get('/{date}', 'topOf');
});

Route::middleware(['web'])->controller(Page::class)->prefix('theme/')->group(function() {
    Route::get('/{slug}', 'rooms');
});
