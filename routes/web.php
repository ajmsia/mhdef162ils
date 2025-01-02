<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoomController;
use App\Http\Controllers\UserReservationController;

// Corrected edit route, only GET should be allowed for viewing the edit form
Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');

// Routes for other pages
Route::get('/user/rooms', [UserRoomController::class, 'index'])->name('user.rooms.index');
Route::get('/reservations/user-create', [ReservationController::class, 'usercreate'])->name('reservations.usercreate');
Route::get('/users', [UserController::class, 'index'])->name('user.index');

// New route for storing reservations
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

// Home Page Route
Route::get('/', function () {
    return view('welcome');
});

// Define routes for user (Patron) and librarian dashboards
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.index');
Route::get('/librarian/dashboard', [LibrarianController::class, 'index'])->name('librarian.index');

// General routes (no login required)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Resource routes for rooms, reservations, user, and librarian
Route::resource('rooms', RoomController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('librarian', LibrarianController::class);
Route::resource('user', UserController::class);
Route::resource('userroom', UserRoomController::class);
Route::resource('userreservation', UserReservationController::class);

// Routes for user dashboard
Route::prefix('user')->name('user.')->group(function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/reservations/usercreate', [ReservationController::class, 'create'])->name('reservations.usercreate');
    Route::get('request', [UserController::class, 'request'])->name('request');
    Route::get('consultation', [UserController::class, 'consultation'])->name('consultation');
});

// Routes for librarian dashboard
Route::prefix('librarian')->name('librarian.')->group(function() {
    Route::get('dashboard', [LibrarianController::class, 'index'])->name('dashboard');
    Route::get('reservation', [LibrarianController::class, 'reservation'])->name('reservation');
    Route::get('request', [LibrarianController::class, 'request'])->name('request');
    Route::get('consultation', [LibrarianController::class, 'consultation'])->name('consultation');
    Route::get('report', [LibrarianController::class, 'report'])->name('report');
});
