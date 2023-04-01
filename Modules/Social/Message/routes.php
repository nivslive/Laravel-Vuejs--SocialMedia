<?php

use Modules\Social\Message\Controllers\MessageController;
use Modules\Social\Message\Controllers\MessageReplyController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::apiResource('api/resource', MessageController::class);
Route::apiResource('api/message-reply', MessageReplyController::class);