<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require_once 'Web/Public/Dashboard.php';
require_once 'Web/Public/Public.php';


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
->group(function () {
    require_once 'Web/Features/Posts.php';
    require_once 'Web/Private/Private.php';
});


Route::get('/', function() {
    return redirect('/topof/all');
});