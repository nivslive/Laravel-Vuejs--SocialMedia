<?php

use Modules\Social\Theme\Controller\ThemeController as Theme;
use Modules\Social\Theme\Controller\WithSubjectController as Subject;
use Modules\Social\Theme\Controller\PageController as Page;
use Illuminate\Support\Facades\Route;

Route::prefix('api/theme')->group(function() {

    Route::apiResource('theme', Theme::class)->except(['index'])->parameter('theme', 'id');

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



Route::middleware(['web'])->controller(Page::class)->prefix('theme/')->group(function() {
    Route::get('/{slug}', 'rooms');
});
