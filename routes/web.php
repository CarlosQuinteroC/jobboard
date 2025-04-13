<?php

use App\Http\Controllers\InterestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Public landing page showing active jobs
Route::get('/', [JobController::class, 'index'])->name('jobs.index');
Route::middleware(['auth'])->group(function () {
    // Group routes for posters only (static routes should come first)
    Route::middleware('role:poster')->group(function () {
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    });

    // Displaying a single job should be defined after the static routes.
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    // Route for toggling interest on a job
    Route::post('/jobs/{job}/interest', [InterestController::class, 'toggle'])->name('jobs.interest.toggle');
});

// Authentication Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
