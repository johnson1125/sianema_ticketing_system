<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SampleMovieController;
use App\Http\Controllers\HallTimeSlotController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('home');
})->name('home');

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

Route::resource('/sampleMovies', SampleMovieController::class);

//Testing admin layout
Route::get('/adminLayout', function () {
    return view('/layouts/adminLayout');
});

// Resource route
Route::resource('hallTimeSlot', HallTimeSlotController::class);

// HallTimeSlot Basic route
Route::middleware('auth', 'verified')->group(function () {
    Route::get('hall-time-slot', [HallTimeSlotController::class,'index'])->name('hallTimeSlot');
    Route::get('hall-time-slot-data', [HallTimeSlotController::class,'getHallTimeSlotData']);
});


//<a href="{{ route('movies.index') }}">Movies</a>
//need to put at navigation
Route::get('movies', [BookingController::class, 'fetchAllMovies'])->name('movies');

Route::get('movies/{id}', [BookingController::class, 'movieDetails'])->name('movies.details');
