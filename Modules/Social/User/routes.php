<?php

use Modules\Social\User\Controller\UserController;
#use Modules\Social\User\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(UserController::class)->prefix('api/User')->group(function() {
    Route::apiResource('/');
});