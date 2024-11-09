<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

//Client
Route::get('/', function () {
    return view('client.welcome');
});


//Admin
Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin', [HomeController::class, 'index'])->name('home');
    Route::resource('admin/user', UserController::class)->names('admin_user');
});
