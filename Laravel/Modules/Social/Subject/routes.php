<?php

use Modules\Social\Subject\Controllers\SubjectController as Subject;
use Modules\Social\Theme\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware(['web'])->group(function() {
    Route::apiResource('api/subject', Subject::class);
    Route::controller(PageController::class)->prefix('subject/')->group(function() {

    });
});