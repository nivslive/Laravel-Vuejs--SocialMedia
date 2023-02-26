<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/all', [DashboardController::class, 'index'])->name('dashboard');