<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::Post('/login', 'authenticate');
    Route::Post('/logout', 'logout');

});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->middleware('guest');;
    Route::post('/register', 'store');
});



Route::middleware(['auth'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index')->middleware('checkrole:admin')->name('admin');

    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->middleware('checkrole:user')->name('user');

    });
});