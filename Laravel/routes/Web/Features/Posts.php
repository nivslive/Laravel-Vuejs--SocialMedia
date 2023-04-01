<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MessageController;


Route::get('/room/post', [ChatController::class, 'post'])->name('room.post');
Route::get('/subject/post', [SubjectController::class, 'post'])->name('subject.post');
Route::post('/message/post', [MessageController::class, 'post'])->name('message.post');

