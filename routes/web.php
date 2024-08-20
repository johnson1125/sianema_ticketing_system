<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SampleMovieController;
use App\Http\Controllers\HallTimeSlotController;

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/testing', function () {
    return view('testing');
});

Route::get('/sassSample', function () {
    return view('sassSample');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('/movies', SampleMovieController::class);

//Testing admin layout
Route::get('/adminLayout', function () {
    return view('/layouts/adminLayout');
});

// Resource route
Route::resource('hallTimeSlot', HallTimeSlotController::class);

// Basic route
Route::get('hall-time-slot', function () {
    return view('admin.hallTimeSlot.index');
})->name('hallTimeSlot');

// Resource route
Route::resource('movie', movieController::class);

// Basic route
Route::get('movie', function () {
    return view('booking.movie');
})->name('movie');
