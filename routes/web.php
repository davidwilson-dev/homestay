<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
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
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Users page
        Route::get('user/locked', [UserController::class, 'locked'])->middleware('role:admin');
        Route::get('user/trash', [UserController::class, 'trash'])->middleware('role:admin');
        Route::resource('user', UserController::class)->names('user')->middleware('role:admin,owner'); 

        // Staffs page
        Route::resource('staff', StaffController::class)->names('staff');

        // Rooms page
        Route::resource('room', RoomController::class)->names('room');
        Route::resource('order', OrderController::class)->names('order');
        Route::get('order-booked', [OrderController::class, 'index_booked']);
        Route::get('order-checkin', [OrderController::class, 'index_checkin']);
        Route::get('order-checkout', [OrderController::class, 'index_checkout']);
    }
);
