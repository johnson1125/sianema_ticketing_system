<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SampleMovieController;
use App\Http\Controllers\HallTimeSlotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;

//to show how to use master page.
Route::view('/test', 'userManagement.test')->name('test');

Route::view('/', 'home')->name('home');
Route::view('/privacyPolicy', 'policy')->name('policy');
Route::view('/termsAndConditions', 'terms')->name('terms');

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
    Route::get('admin/hall-time-slot/create/{hallID}_{date}/{activeTab?}', [HallTimeSlotController::class,'create'])->name('hallTimeSlot.create')->defaults('activeTab', 'Movie');
    Route::get('admin/hall-time-slot/create/{hallID}_{date}/{maintenanceID}/details', [HallTimeSlotController::class,'showMaintenanceDetails'])->name('hallTimeSlot.showMaintenanceDetails');
    Route::post('date-input', [HallTimeSlotController::class,'getDate'])->name('hallTimeSlot.getDate');
    Route::post('hallTimeSlot-input/{hallID}_{date}_{hallTimeSlotType}', [HallTimeSlotController::class,'store'])->name('hallTimeSlot.store');
    Route::get('hall-time-slot-data', [HallTimeSlotController::class,'getHallTimeSlotData']);
    Route::get('maintenance-data/{maintenanceID}', [HallTimeSlotController::class,'getMaintenanceData']);
});



Route::get('booking-movies', [BookingController::class, 'fetchAllMovies'])->name('movies');
Route::get('booking-movies/{movie_id}', [BookingController::class, 'movieDetails'])->name('movies.details');
Route::post('booking-date-button-click', [BookingController::class, 'dateButtonClick'])->name('dateButtonClick');
Route::get('booking-movie-cover-photo/{movie_id}', [BookingController::class, 'getMovieCoverPhoto'])->name('movie.coverPhoto');
Route::get('booking-movie-poster-photo/{movie_id}', [BookingController::class, 'getMoviePoster'])->name('movie.posterPhoto');
Route::get('booking-movieSeat', [BookingController::class, 'timeSlotSelect'])->name('timeSlotSelect');




Route::resource('manage-movie', MovieController::class);

Route::get('create-movie', [MovieController::class, 'create'])->name('movies.create');
Route::post('/create-movie-success', [MovieController::class, 'store'])->name('movies.store');
Route::get('manage-movie', [MovieController::class, 'index'])->name('movies.index');

Route::put('update-movie-success/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::get('show-movie/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('edit-movie/{id}',[MovieController::class,'edit'])->name('movies.edit');
Route::get('movie-poster/{movie_id}', [MovieController::class, 'getMoviePoster'])->name('movie.poster');
Route::get('movie-cover-photo/{movie_id}', [MovieController::class, 'getMovieCoverPhoto'])->name('movie.cover.photo');

