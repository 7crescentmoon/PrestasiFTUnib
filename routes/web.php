<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\RegisterController;
use App\Models\Prestasi;

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
        return view('landingPage.welcome');
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
        Route::middleware(['checkrole:admin,super admin'])->group(function () {
            //admin & super admin
            Route::controller(AdminController::class)->group(function () {
                Route::get('/dashboard/admin', 'index')->name('adminDashboard');
                // profile admin
                Route::get('/dashboard/admin/profile/{Id:id}', 'profile')->name('adminProfile');
                Route::patch('/dashboard/admin/edit-profile/{id}', 'editProfile')->name('editProfile');

                // manajemen user
                Route::get('/dashboard/admin/user-list', 'userList')->name('userList');               
                Route::get('/dashboard/admin/add-user-view', 'addUser')->name('addUserView');
                Route::post('/dashboard/admin/add-User', 'store')->name('addUser');
                Route::get('/dashboard/admin/admin-list', 'adminList')->name('adminList');
                Route::get('/dashboard/admin/add-admin-view', 'addAdmin')->name('addAdminView');
                Route::post('/dashboard/admin/add-admin', 'store')->name('addAdmin');
                Route::get('/dashboard/admin/delete-user/{id}', 'destroy')->name('deleteUser');
                Route::get('/dashboard/admin/edit-user-view/{id}', 'editUser')->name('editUserView');
                Route::put('/dashboard/admin/edit-user/{id}', 'update')->name('editUser');

                // manajemen pengajuan persetujuan
                Route::controller(PengajuanController::class)->group(function () {
                    Route::get('/dashboard/admin/daftar-pengajuan', 'index')->name('daftarPengajuan');
                    Route::get('/dashboard/admin/data-pengajuan/{id}', 'show')->name('dataPengajuan');
                    Route::get('/dashboard/admin/delete-pengajuan/{id}', 'destroy')->name('deletePengajuan');

                });

                // manajemen prestasi
                Route::controller(PrestasiController::class)->group(function () {
                    Route::get('/dashboard/admin/daftar-prestasi','index')->name('daftarPrestasi');
                    Route::get('/dashboard/admin/tambah-prestasi','create')->name('viewTambahPrestasi');
                    Route::post('/dashboard/admin/tambah-prestasi','storePrestasi')->name('kirimPrestasi');
                    Route::post('/dashboard/admin/data-prestasi/{data}', 'store')->name('dataPrestasi');
                    Route::get('/dashboard/admin/data-mahasiswa/{id}', 'show')->name('dataMahasiswa');
                    Route::get('/dashboard/admin/delete-prestasi/{id}', 'destroy')->name('hapusPrestasi');
                });

            });

        });

        //mahasiswa
        Route::controller(UserController::class)->group(function () {
            Route::middleware(['checkrole:user'])->group(function () {

                Route::get('/dashboard', 'index')->name('userDashboard');

                // profile user
                Route::get('/dashboard/profile/{id}', 'profileSetting')->name('userProfile');
                Route::put('/dashboard/edit-profile/{id}', 'editProfile')->name('editProfileUser');
                
                
                //pengjuan
                Route::controller(PengajuanController::class)->group(function () {
                    Route::get('/dashboard/pengajuan-prestasi', 'create')->name('lamanPengajuan');
                    Route::post('/dashboard/pengajuan-prestasi', 'store')->name('kirimPengajuan');
                    
                });
                Route::controller(PrestasiController::class)->group(function () {
                    Route::get('/dashboard/daftar-prestasi', 'daftarPrestasiUser')->name('daftarPrestasiUser');
                    Route::get('/dashboard/data-prestasi/{id}', 'dataPrestasiMahasiswa')->name('dataPrestasiMahasiswa');
                });

            });

        });
    });

});