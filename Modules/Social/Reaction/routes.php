<?php

use Modules\Social\Reaction\Controller\ReactionController;
#use Modules\Social\Reaction\Controller\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::apiResource('api/reaction', ReactionController::class);