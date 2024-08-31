<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SampleMovieController;
use App\Http\Controllers\HallTimeSlotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;

Route::view('/', 'home')->name('home');

//to show how to use master page.
Route::view('/test', 'userManagement.test')->name('test');

Route::view('/privacyPolicy', 'policy')->name('policy');
Route::view('/termsAndCondition', 'terms')->name('terms');

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
// Route::resource('hallTimeSlot', HallTimeSlotController::class);

// Admin Homepage route
Route::get('admin', [HallTimeSlotController::class,'index']);

// HallTimeSlot Basic route

Route::middleware('auth', 'verified')->group(function () {
    Route::get('admin/hall-time-slot/{date?}', [HallTimeSlotController::class,'index'])->name('hallTimeSlot')->defaults('date', date('d-m-Y')) ;
    Route::post('submit-form', [HallTimeSlotController::class,'getDate'])->name('hallTimeSlot.getDate');
    Route::post('submit-form-1', [HallTimeSlotController::class,'store'])->name('hallTimeSlot.store');
    Route::get('admin/hall-time-slot/create/{hallID}_{date}', [HallTimeSlotController::class,'create'])->name('hallTimeSlot.create');
    Route::get('hall-time-slot-data', [HallTimeSlotController::class,'getHallTimeSlotData']);
});



Route::get('movies', [BookingController::class, 'fetchAllMovies'])->name('movies');
Route::get('movies/{movie_id}', [BookingController::class, 'movieDetails'])->name('movies.details');
Route::post('/date-button-click', [BookingController::class, 'dateButtonClick'])->name('dateButtonClick');



Route::resource('manage-movie', MovieController::class);

Route::get('create-movie', [MovieController::class, 'create'])->name('movies.create');
Route::post('/create-movie-success', [MovieController::class, 'store'])->name('movies.store');
Route::get('manage-movie', [MovieController::class, 'index'])->name('movies.index');

Route::put('update-movie-success/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::get('show-movie/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('edit-movie/{id}',[MovieController::class,'edit'])->name('movies.edit');
Route::get('movie-poster/{movie_id}', [MovieController::class, 'getMoviePoster'])->name('movie.poster');
Route::get('movie-cover-photo/{movie_id}', [MovieController::class, 'getMovieCoverPhoto'])->name('movie.cover.photo');

