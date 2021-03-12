<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Profile Setting
Route::resource('profile', 'Profile\ProfileController');
Route::resource('image_profile', 'Profile\ImageProfileController');
Route::put('/profile', 'Profile\ProfileController@change_password')->name('profile.change_password');

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Akun\AdminController@index')->name('admin.index');

    /* Data Pengguna */

    //Manage Petugas
    // Route::resource('manage_petugas', 'Admin\ManagePetugasController');
    Route::get('/manage_petugas', 'Admin\ManagePetugasController@index');
    Route::get('/manage_petugas/create', 'Admin\ManagePetugasController@create');
    Route::post('/manage_petugas/create', 'Admin\ManagePetugasController@store');
    Route::get('/manage_petugas/{id}/edit', 'Admin\ManagePetugasController@edit');
    Route::put('/manage_petugas/edit/{id}', 'Admin\ManagePetugasController@update');
    Route::delete('/manage_petugas/delete/{id}', 'Admin\ManagePetugasController@destroy');

    //Manage User
    // Route::resource('manage_user', 'Admin\ManageUserController');
    Route::get('/manage_user', 'Admin\ManageUserController@index');
    Route::get('/manage_user/create', 'Admin\ManageUserController@create');
    Route::post('/manage_user/create', 'Admin\ManageUserController@store');
    Route::get('/manage_user/{id}/edit', 'Admin\ManageUserController@edit');
    Route::put('/manage_user/edit/{id}', 'Admin\ManageUserController@update');
    Route::delete('/manage_user/delete/{id}', 'Admin\ManageUserController@destroy');

    /* Data Master */

    //Manage Kategori Laporan
    // Route::resource('manage_kategori_laporan', 'Admin\ManageKategoriLaporanController');
    Route::get('/manage_kategori_laporan', 'Admin\ManageKategoriLaporanController@index');
    Route::get('/manage_kategori_laporan/create', 'Admin\ManageKategoriLaporanController@create');
    Route::post('/manage_kategori_laporan/create', 'Admin\ManageKategoriLaporanController@store');
    Route::get('/manage_kategori_laporan/{id}/edit', 'Admin\ManageKategoriLaporanController@edit');
    Route::put('/manage_kategori_laporan/edit/{id}', 'Admin\ManageKategoriLaporanController@update');
    Route::delete('/manage_kategori_laporan/delete/{id}', 'Admin\ManageKategoriLaporanController@destroy');

    //Manage Lokasi
    // Route::resource('manage_lokasi', 'Admin\ManageLokasiController');
    Route::get('/manage_lokasi', 'Admin\ManageLokasiController@index');
    Route::get('/manage_lokasi/create', 'Admin\ManageLokasiController@create');
    Route::post('/manage_lokasi/create', 'Admin\ManageLokasiController@store');
    Route::get('/manage_lokasi/{id}/edit', 'Admin\ManageLokasiController@edit');
    Route::put('/manage_lokasi/edit/{id}', 'Admin\ManageLokasiController@update');
    Route::delete('/manage_lokasi/delete/{id}', 'Admin\ManageLokasiController@destroy');

    /* Pengaduan */

    //Laporan
    // Route::resource('laporan', 'Pengaduan\LaporanController');
    Route::get('/laporan', 'Pengaduan\LaporanController@index');
    Route::get('/laporan/create', 'Pengaduan\LaporanController@create');
    Route::post('/laporan/create', 'Pengaduan\LaporanController@store');
    Route::get('/laporan/{id}/edit', 'Pengaduan\LaporanController@edit');
    Route::get('/laporan/{id}/show', 'Pengaduan\LaporanController@show');
    Route::put('/laporan/edit/{id}', 'Pengaduan\LaporanController@update');
    Route::delete('/laporan/delete/{id}', 'Pengaduan\LaporanController@destroy');

    //Tanggapan
    // Route::resource('tanggapan', 'Pengaduan\TanggapanController');
    Route::get('/tanggapan', 'Pengaduan\TanggapanController@index');
    Route::get('/tanggapan/create', 'Pengaduan\TanggapanController@create');
    Route::post('/tanggapan/create', 'Pengaduan\TanggapanController@store');
    Route::get('/tanggapan/{id}/edit', 'Pengaduan\TanggapanController@edit');
    Route::put('/tanggapan/edit/{id}', 'Pengaduan\TanggapanController@update');
    Route::delete('/tanggapan/delete/{id}', 'Pengaduan\TanggapanController@destroy');
});

//petugas
Route::group(['prefix' => 'petugas', 'middleware' => 'petugas'], function () {
    Route::get('/', 'Akun\PetugasController@index')->name('petugas.index');

    /* Pengaduan */

    //Laporan
    // Route::resource('laporan', 'Pengaduan\LaporanController');
    Route::get('/laporan', 'Pengaduan\LaporanController@index');
    Route::get('/laporan/create', 'Pengaduan\LaporanController@create');
    Route::post('/laporan/create', 'Pengaduan\LaporanController@store');
    Route::get('/laporan/{id}/edit', 'Pengaduan\LaporanController@edit');
    Route::get('/laporan/{id}/show', 'Pengaduan\LaporanController@show');
    Route::put('/laporan/edit/{id}', 'Pengaduan\LaporanController@update');
    Route::delete('/laporan/delete/{id}', 'Pengaduan\LaporanController@destroy');

    //Tanggapan
    // Route::resource('tanggapan', 'Pengaduan\TanggapanController');
    Route::get('/tanggapan', 'Pengaduan\TanggapanController@index');
    Route::get('/tanggapan/create', 'Pengaduan\TanggapanController@create');
    Route::post('/tanggapan/create', 'Pengaduan\TanggapanController@store');
    Route::get('/tanggapan/{id}/edit', 'Pengaduan\TanggapanController@edit');
    Route::put('/tanggapan/edit/{id}', 'Pengaduan\TanggapanController@update');
    Route::delete('/tanggapan/delete/{id}', 'Pengaduan\TanggapanController@destroy');
});

//pengguna
Route::group(['prefix' => 'pengguna', 'middleware' => 'pengguna'], function () {
    Route::get('/', 'Akun\PenggunaController@index')->name('pengguna.index');

    /* Pengaduan */

    //Laporan
    // Route::resource('laporan', 'Pengaduan\LaporanController');
    Route::get('/laporan', 'Pengaduan\LaporanController@index');
    Route::get('/laporan/create', 'Pengaduan\LaporanController@create');
    Route::post('/laporan/create', 'Pengaduan\LaporanController@store');
    Route::get('/laporan/{id}/edit', 'Pengaduan\LaporanController@edit');
    Route::get('/laporan/{id}/show', 'Pengaduan\LaporanController@show');
    Route::put('/laporan/edit/{id}', 'Pengaduan\LaporanController@update');
    Route::delete('/laporan/delete/{id}', 'Pengaduan\LaporanController@destroy');
});
