<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(MessageController::class)->prefix('message')->group(function () {
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::post('/{id}', 'post');
});

Route::controller(ChatController::class)->prefix('chat')->group(function () {
    Route::get('/{id}', 'show');
});
Route::controller(SubjectController::class)->prefix('subject')->group(function () {
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
});

