<?php

use App\Http\Controllers\AdminProfileController;
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

Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->middleware('guest')->name('login');
        Route::Post('/login', 'authenticate');
        Route::Post('/logout', 'logout')->name('logout');

    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'index')->middleware('guest')->name('register');
        Route::post('/register', 'store');
    });



    Route::middleware(['auth'])->group(function () {

        //admin & super admin
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard/admin', 'index')->middleware(['checkrole:admin,super admin'])->name('adminDashboard');

            Route::get('/dashboard/admin/profile/{Id:id}', 'profile')->name('adminProfile');
            Route::patch('/dashboard/admin/edit-profile/{id}', 'editProfile')->name('editProfile');

            Route::get('/dashboard/admin/user-list', 'userList')->name('userList');
            Route::get('/dashboard/admin/admin-list', 'adminList')->name('adminList');

            Route::get('/dashboard/admin/add-user-view', 'addUser')->name('addUserView');
            Route::post('/dashboard/admin/add-User', 'store')->name('addUser');

            Route::get('/dashboard/admin/add-admin-view', 'addAdmin')->name('addAdminView');
            Route::post('/dashboard/admin/add-admin', 'store')->name('addAdmin');
            
            Route::get('/dashboard/admin/delete-user/{id}', 'destroy')->name('deleteUser');

            Route::get('/dashboard/admin/edit-user-view/{id}', 'editUser')->name('editUserView');
            Route::put('/dashboard/admin/edit-user/{id}', 'update')->name('editUser');

        });



        //user
        Route::controller(UserController::class)->group(function () {
            Route::get('/dashboard', 'index')->middleware('checkrole:user')->name('userDashboard');

            Route::get('/dashboard/profile/{id}', 'profileSetting')->name('userProfile');
            Route::put('/dashboard/edit-profile/{id}', 'editProfile')->name('editProfileUser');

        });
    });

});