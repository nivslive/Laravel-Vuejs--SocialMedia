<?php

use Modules\Social\User\Controller\UserNotificationController;
#use Modules\Social\User\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(UserNotificationController::class)
    ->prefix('api/user-notification')
    ->group(function() {

        Route::apiResource('/');

    });

Route::controller(UserTrendsController::class)
    ->prefix('api/user-trends')
    ->group(function() {
        Route::get('/', 'index');
        Route::get('/last-likes', 'lastsLikes');

        Route::get('more-likes-in-my-subjects', 'moreLikesInMySubjects');
        Route::get('/more-likes-in-my-messages', 'moreLikesInMyMessages');

        Route::get('/my-favorited-subjects', 'myFavoritesSubjects');
        Route::get('/my-favorited-chats', 'myFavoritesSubjects');
});