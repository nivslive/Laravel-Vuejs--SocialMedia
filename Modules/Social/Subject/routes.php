<?php

use Modules\Social\Subject\Controller\SubjectController as Subject;
use Modules\Social\Chat\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(Subject::class)->prefix('api/subject')->group(function() {

    Route::get('/', 'all');
    Route::post('/', 'post');
    Route::put('/', 'update');
    Route::delete('/', 'delete');

});

Route::controller(PageController::class)->prefix('subject/')->group(function() {

});
