<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'jobs.index');



// Register
Route::get('/register', [RegisterController::class, 'create'])->name('register');;
Route::post('/register', [RegisterController::class, 'store']);

//Session
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
