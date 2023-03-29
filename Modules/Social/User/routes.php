<?php

use Modules\Social\User\Controller\UserNotificationController;
#use Modules\Social\User\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(UserNotificationController::class)->prefix('api/UserNotification')->group(function() {
    Route::apiResource('/');
});