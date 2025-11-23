<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\StaffController;
// use App\Http\Controllers\RoomController;
// use App\Http\Controllers\OrderController;

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

//Client

//Admin
Auth::routes();

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function(){
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::resource('user', UserController::class)->names('user');
        Route::resource('staff', StaffController::class)->names('staff');
        Route::resource('room', RoomController::class)->names('room');
        Route::resource('order', OrderController::class)->names('order');
        Route::get('order-booked', [OrderController::class, 'index_booked']);
        Route::get('order-checkin', [OrderController::class, 'index_checkin']);
        Route::get('order-checkout', [OrderController::class, 'index_checkout']);
    }
);
