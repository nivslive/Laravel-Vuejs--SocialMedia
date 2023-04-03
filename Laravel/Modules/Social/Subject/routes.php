<?php

use Modules\Social\Subject\Controllers\SubjectController as Subject;
use Modules\Social\Chat\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::apiResource('api/subject', Subject::class);
Route::controller(PageController::class)->prefix('subject/')->group(function() {

});
