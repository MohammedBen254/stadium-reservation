<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StadeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'stadium'])->name('home');

Route::resource('profile', ProfileController::class)->only(['show', 'update']);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');   
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/addStade', [StadeController::class, 'add']);
Route::post('/home', [StadeController::class, 'store'])->name('stades.store');
Route::delete('/stades/delete/{id}', [StadeController::class, 'delete'])->name('stades.delete');
Route::put('/stades/{stade}/edit', [StadeController::class, 'update'])->name('stades.update');

Route::get('/stades/{id}/edit', [StadeController::class, 'show'])->name('stades.show');
Route::get('/stades/{id}/reserve', [StadeController::class, 'show'])->name('stades.show');


Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/booking/delete/{id}', [BookingController::class, 'delete'])->name('booking.delete');
Route::get('/booking/print/{id}', [BookingController::class, 'print'])->name('booking.print');





Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{booking}/print', [BookingController::class, 'downloadTicketImage'])->name('booking.print');
Route::get('/booking/confirm', [BookingController::class, 'confirmation'])->name('booking.confirm');
Route::get('/booking/eject', [BookingController::class, 'ejection'])->name('booking.eject');
Route::get('/booking/{stade}', [TicketController::class, 'showTicket'])->name('ticket.show');

Route::get('/users', [UserController::class, 'ShowUsers'])->name('users.show');
Route::post('/users/{id}/remove-user', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::post('/users/{id}/remove-admin', [UserController::class, 'removeAdmin'])->name('removeAdmin');
Route::post('/users/{id}/setAdmin', [UserController::class, 'setAdmin'])->name('setAdmin');



