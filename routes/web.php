<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoomController;
use App\Http\Controllers\UserReservationController;

Route::match(['GET', 'PATCH'], '/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::get('/user/rooms', [UserRoomController::class, 'index'])->name('user.rooms.index');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('rooms', RoomController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('librarian', LibrarianController::class);
    Route::resource('user', UserController::class);
    Route::resource('userroom', UserRoomController::class);
    Route::resource('userreservation', UserReservationController::class);
});
