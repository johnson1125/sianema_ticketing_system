<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SampleMovieController;
use App\Http\Controllers\HallTimeSlotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HallController;

Route::get('/', function () {
    return view('home');
})->name('home');

//to show how to use master page.
Route::get('/test', function () {
    return view('userManagement.test');
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


Route::resource('manage-hall', HallController::class);

Route::middleware('auth', 'verified')->group(function (){
    Route::get('admin/manage-hall', [HallController::class,'index'])->name('manage.hall.index');
    Route::get('admin/add-hall', [HallController::class,'create'])->name('manage.hall.create');
    Route::post('admin/create-hall-success', [HallController::class, 'store'])->name('manage.hall.store');
    Route::get('admin/halls/get-hall-info/{hallType}', [HallController::class, 'getHallInfo']);
    Route::post('/manage/hall/{hall_id}/change-status', [HallController::class, 'update'])->name('manage.hall.change-status');
    Route::get('admin/edit-hall/{id}/seats',[HallController::class,'edit'])->name('manage.hall.edit.seat');
    Route::post('admin/edit-hall/{hall_id}/seats/update', [HallController::class, 'update'])->name('seat.update');
});