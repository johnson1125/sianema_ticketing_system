<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HallTimeSlotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;

//Testing routes start
//to show how to use master page.
Route::view('/test', 'userManagement.test')->name('test');

// User public routes (does not require login)
Route::get('/', [HomeController::class, 'fetchAllMovies'])->name('home');
Route::view('/privacyPolicy', 'policy')->name('policy');
Route::view('/termsAndConditions', 'terms')->name('terms');
Route::view('/aboutUs', 'aboutUs')->name('aboutUs');

//Profile photo route
Route::get('/profile-photo/{id}-profile-photo', [ProfileController::class, 'showProfilePhoto'])->name('profile.photo');

Route::middleware('auth')->group(function () {
    Route::get('/{role}/{name}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/{role}/{name}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/{role}/{name}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Homepage route
Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('admin{date?}', [HallTimeSlotController::class, 'index'])->name('admin')->defaults('date', date('d-m-Y'));
});

// HallTimeSlot Basic route
Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('admin/hall-time-slot/{date?}', [HallTimeSlotController::class, 'index'])->name('hallTimeSlot')->defaults('date', date('d-m-Y'));
    Route::get('admin/hall-time-slot/create/{hallID}_{date}/{activeTab?}', [HallTimeSlotController::class, 'create'])->name('hallTimeSlot.create')->defaults('activeTab', 'Movie');
    Route::get('admin/hall-time-slot/create/{hallID}_{date}/maintenance/{maintenanceID}', [HallTimeSlotController::class, 'showMaintenanceDetails'])->name('hallTimeSlot.showMaintenanceDetails');
    Route::get('admin/hall-time-slot/create/{hallID}_{date}/movie/{movieID}', [HallTimeSlotController::class, 'showMovieDetails'])->name('hallTimeSlot.showMovieDetails');
    Route::get('admin/hall-time-slot/show/{hallTimeSlotID}', [HallTimeSlotController::class, 'show'])->name('hallTimeSlot.show');
    Route::post('date-input', [HallTimeSlotController::class, 'getDate'])->name('hallTimeSlot.getDate');
    Route::post('hallTimeSlot-store/{hallID}_{date}_{hallTimeSlotType}', [HallTimeSlotController::class, 'store'])->name('hallTimeSlot.store');
    Route::delete('hallTimeSlot-delete/{hallTimeSlotID}', [HallTimeSlotController::class, 'destroy'])->name('hallTimeSlot.delete');
});

Route::get('api/hall-time-slot-data/{date}/{hallID?}', [HallTimeSlotController::class, 'getHallTimeSlotData'])->defaults('hallID', "");
Route::get('api/maintenance-data/{maintenanceID}', [HallTimeSlotController::class, 'getMaintenanceData']);
Route::get('api/movie-data/{movieID}', [HallTimeSlotController::class, 'getMovieData']);

// User public routes (does not require login)
Route::get('booking-movies', [BookingController::class, 'fetchAllMovies'])->name('movies');
Route::get('booking-movies/{movie_id}', [BookingController::class, 'movieDetails'])->name('movies.details');
Route::post('booking-date-button-click', [BookingController::class, 'dateButtonClick'])->name('dateButtonClick');
Route::get('booking-movie-cover-photo/{movie_id}', [BookingController::class, 'getMovieCoverPhoto'])->name('movie.coverPhoto');
Route::get('booking-movie-poster-photo/{movie_id}', [BookingController::class, 'getMoviePoster'])->name('movie.posterPhoto');

Route::middleware('auth', 'role:user')->group(function () {
    Route::get('booking-movieSeat', [BookingController::class, 'timeSlotSelect'])->name('timeSlotSelect');
    Route::post('booking-process-payment', [BookingController::class, 'processPayment'])->name('payment');
    Route::get('booking-payment', [BookingController::class, 'showPaymentPage'])->name('showPaymentPage');
    Route::post('booking-complete-payment', [BookingController::class, 'completePayment'])->name('complete_payment');
    Route::get('booking-payment-success', [BookingController::class, 'paymentSuccess'])->name('payment.success');
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('admin/create-movie', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/create-movie-success', [MovieController::class, 'store'])->name('movies.store');
    Route::get('admin/manage-movie', [MovieController::class, 'index'])->name('movies.index');
    Route::post('update-movie-success/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::get('admin/show-movie/{id}', [MovieController::class, 'show'])->name('movies.show');
    Route::get('admin/edit-movie/{id}', [MovieController::class, 'edit'])->name('movies.edit');
    Route::get('movie-poster/{movie_id}', [MovieController::class, 'getMoviePoster'])->name('movie.poster');
    Route::get('movie-cover-photo/{movie_id}', [MovieController::class, 'getMovieCoverPhoto'])->name('movie.cover.photo');
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('admin/manage-hall', [HallController::class, 'index'])->name('manage.hall.index');
    Route::get('admin/add-hall', [HallController::class, 'create'])->name('manage.hall.create');
    Route::post('admin/create-hall-success', [HallController::class, 'store'])->name('manage.hall.store');
    Route::get('admin/halls/get-hall-info/{hallType}', [HallController::class, 'getHallInfo']);
    Route::post('/manage/hall/{hall_id}/change-status', [HallController::class, 'update'])->name('manage.hall.change-status');
    Route::get('admin/edit-hall/{hall_id}/seats', [HallController::class, 'edit'])->name('manage.hall.edit.seat');
    Route::post('admin/edit-hall/{hall_id}/seats/update', [HallController::class, 'updateSeatStatus'])->name('seat.update');
    Route::get('/hall/{hall_id}/maintenance-history', [HallController::class, 'showMaintenanceHistory'])->name('hall.maintenance.history');
});
