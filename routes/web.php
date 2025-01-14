<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoomController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\ConsultationController;

// Corrected edit route, only GET should be allowed for viewing the edit form
Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::get('/requests/{requestID}/edit', [RequestsController::class, 'edit'])->name('requests.edit');

// Routes for other pages
Route::get('/user/rooms', [UserRoomController::class, 'index'])->name('user.rooms.index');
Route::get('/reservations/user-create', [ReservationController::class, 'usercreate'])->name('reservations.usercreate');
Route::get('/requests/user-create', [RequestsController::class, 'usercreate'])->name('requests.usercreate'); // added route for user request create view
Route::get('/consultations/user-create', [ConsultationController::class, 'usercreate'])->name('consultations.usercreate'); 

// New route for storing
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::post('/requests', [RequestsController::class, 'store'])->name('requests.store');
Route::post('/consultations', [ConsultationController::class, 'store'])->name('consultations.store'); 

// Home Page Route
Route::get('/', function () {
    return view('welcome');
});

// Define routes for user (Patron) and librarian dashboards
Route::get('/librarian', [LibrarianController::class, 'index'])->name('librarian.index'); 

// Resource routes for rooms, reservations, user, and librarian
Route::resource('rooms', RoomController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('librarian', LibrarianController::class);
Route::resource('consultations', ConsultationController::class);
Route::resource('user', UserController::class);
Route::resource('userroom', UserRoomController::class);
Route::resource('userreservation', UserReservationController::class);
Route::resource('requests', RequestsController::class);

// Routes for user dashboard (updated to match /user)
Route::prefix('user')->name('user.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/reservations/usercreate', [ReservationController::class, 'create'])->name('reservations.usercreate');
    Route::get('/requests/usercreate', [RequestsController::class, 'create'])->name('requests.usercreate'); // update: added the usercreate for requests
    Route::get('/consultations/usercreate', [ConsultationController::class, 'create'])->name('consultations.usercreate'); 
    
    Route::get('/requests/{requests}/user-show', [RequestsController::class, 'usershow'])->name('requests.usershow');
    Route::get('/reservations/{reservation}/user-show', [ReservationController::class, 'usershow'])->name('reservations.usershow');
    Route::get('/consultations/{consultation}/user-show', [ConsultationController::class, 'usershow'])->name('consultations.usershow');

});

// Routes for librarian dashboard
Route::prefix('librarian')->name('librarian.')->group(function() {
    Route::get('/', [LibrarianController::class, 'index'])->name('index');  
    Route::get('/reservation', [LibrarianController::class, 'reservation'])->name('reservation');
    Route::get('/requests', [RequestsController::class, 'requests'])->name('requests');
    
});

//Edit
Route::get('/consultations/{consultation}/edit', [ConsultationController::class, 'edit'])->name('consultations.edit');
Route::get('/requests/{requestID}/edit', [RequestsController::class, 'edit'])->name('requests.edit');

//Update
Route::put('/consultations/{consultation}', [ConsultationController::class, 'update'])->name('consultations.update');
Route::put('/requests/{request}', [RequestsController::class, 'update'])->name('requests.update');

//Delete
Route::delete('/consultations/{consultation}', [ConsultationController::class, 'destroy'])->name('consultations.destroy');
Route::delete('/requests/{request}', [RequestsController::class, 'destroy'])->name('requests.destroy');
