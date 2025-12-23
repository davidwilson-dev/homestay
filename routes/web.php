<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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
        Route::delete('user/{id}/delete', [UserController::class, 'delete'])->middleware('role:admin,owner')->name('user.delete');
        Route::patch('user/{id}/restore', [UserController::class, 'restore'])->middleware('role:admin')->name('user.restore');
        Route::delete('user/{id}/force', [UserController::class, 'force'])->middleware('role:admin')->name('user.force');
        Route::resource('user', UserController::class)->middleware('role:admin,owner')->names('user'); 
    }
);

//Client
