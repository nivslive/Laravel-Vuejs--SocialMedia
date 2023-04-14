<?php
use Modules\Admin\Controllers\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware(['web'])->prefix('yorus-admin/')->group(function() {
    //Route::apiResource('api/admin', AdminController::class);
    Route::controller(PageController::class)->prefix('data')->group(function() {
        Route::get('/', 'dashboard');
        Route::get('/themes', 'themes');
        Route::get('/subjects', 'subjects');
        Route::get('/messages', 'messages');
    });
});