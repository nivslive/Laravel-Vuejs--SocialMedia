<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ChatController, SubjectController, MessageController};

Route::get('/room/post', [ChatController::class, 'post'])->name('room.post');
Route::get('/subject/post', [SubjectController::class, 'post'])->name('subject.post');
Route::get('/message/post', [MessageController::class, 'post'])->name('message.post');

