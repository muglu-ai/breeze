<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/event_update', [EventController::class, 'edit'])->name('event.edit');
    Route::patch('/event_update', [EventController::class, 'update'])->name('event.update');
});


require __DIR__.'/auth.php';
