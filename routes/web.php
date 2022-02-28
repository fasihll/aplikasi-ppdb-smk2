<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\DataBiodata;
use App\Http\Controllers\DataRaport;
use App\Http\Controllers\DataJurusan;
use App\Http\Controllers\DataKTM;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'daftar'])->name('register');


Route::group(['middleware' => 'AuthMiddleware'], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::post('/biodata', [BiodataController::class, 'simpan'])->name('biodata');


    Route::get('/raport', [RaportController::class, 'index'])->name('raport');
    Route::post('/raport', [RaportController::class, 'simpan'])->name('raport');


    Route::group(['middleware' => 'AdminMiddleware'], function () {
        //admin
        Route::get('/dataBiodata', [DataBiodata::class, 'index'])->name('dataBiodata');
        Route::get('/editBiodata/{id_biodata}', [DataBiodata::class, 'edit'])->name('editBiodata');
        Route::post('/editBiodata/{id_biodata}', [DataBiodata::class, 'update'])->name('editBiodata');
        Route::get('/deleteBiodata/{id_biodata}', [DataBiodata::class, 'delete'])->name('deleteBiodata');

        Route::get('/dataRaport', [DataRaport::class, 'index'])->name('dataRaport');
        Route::get('/detailRaport/{id}', [DataRaport::class, 'detail'])->name('detailRaport');
        Route::get('/editRaport/{id}', [DataRaport::class, 'edit'])->name('editRaport');
        Route::post('/editRaport/{id}', [DataRaport::class, 'update'])->name('editRaport');
        Route::get('/deleteRaport/{id}', [DataRaport::class, 'delete'])->name('deleteRaport');


        Route::get('/dataJurusan', [DataJurusan::class, 'index'])->name('dataJurusan');
        Route::get('/tambahJurusan', [DataJurusan::class, 'tambah'])->name('tambahJurusan');
        Route::post('/tambahJurusan', [DataJurusan::class, 'insert'])->name('tambahJurusan');
        Route::get('/editJurusan/{id_jurusan}', [DataJurusan::class, 'edit'])->name('editJurusan');
        Route::post('/editJurusan/{id_jurusan}', [DataJurusan::class, 'update'])->name('editJurusan');
        Route::get('/deleteJurusan/{id_jurusan}', [DataJurusan::class, 'delete'])->name('deleteJurusan');


        Route::get('/dataKTM', [DataKTM::class, 'index'])->name('dataKTM');
        Route::get('/tambahKTM', [DataKTM::class, 'tambah'])->name('tambahKTM');
        Route::post('/tambahKTM', [DataKTM::class, 'insert'])->name('tambahKTM');

        Route::get('/editKTM/{id_ktm}', [DataKTM::class, 'edit'])->name('editKTM');
        Route::post('/editKTM/{id_ktm}', [DataKTM::class, 'update'])->name('editKTM');
        Route::get('/deleteKTM/{id_ktm}', [DataKTM::class, 'delete'])->name('deleteKTM');



        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    });
});
