<?php

use Modules\Social\Message\Controllers\MessageController;
use Modules\Social\Chat\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::apiResource('api/resource', MessageController::class);
Route::controller(PageController::class)->prefix('message/')->group(function() {

});
