<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;


Route::get('/room/{chat}/{subject}', [ChatController::class, 'room'])->name('room');
