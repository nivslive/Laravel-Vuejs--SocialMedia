<?php
use Modules\Social\User\Controllers\UserFriendsController;
use Modules\Social\User\Controllers\UserTrendsController;
use Modules\Social\User\Controllers\UserNotificationController;
use Modules\Social\User\Controllers\UserCategoryController;
use Modules\Social\User\Controllers\UserReplyController;
#use Modules\Social\User\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::apiResource('api/user-notification', UserNotificationController::class);

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

Route::apiResource('api/user-friends', UserTrendsController::class);
Route::apiResource('api/user-followers', UserFriendsController::class);
Route::apiResource('api/user-categories', UserCategoryController::class);

Route::controller(UserTrendsController::class)
    ->prefix('api/user-friends')
    ->group(function() {

        Route::get('/by-user/{id}', 'byUser');
        Route::get('/by-user/{id}/friend/{friend_id}', 'byUserHasFriend');
});

#Route::apiResource('api/user-chat', UserChatController::class);
#Route::apiResource('api/user-friend', UserFriendController::class);
#Route::apiResource('api/user-chat-message', UserChatMessageController::class);
#Route::apiResource('api/user-chat-friend', UserChatFriendController::class);