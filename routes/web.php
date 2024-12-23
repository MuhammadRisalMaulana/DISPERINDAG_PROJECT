<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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

// Admin/Petugas
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('pengaduans', 'PengaduanController');

        Route::resource('tanggapan', 'TanggapanController');

        Route::resource('kelola-masyarakat', 'KelolaMasyarakatController');
        Route::get('/kelola-masyarakat/{id}/delete', 'KelolaMasyarakatController@confirmDelete')->name('kelola-masyarakat.confirmDelete');
        Route::delete('/kelola-masyarakat/{id}', 'KelolaMasyarakatController@destroy')->name('kelola-masyarakat.destroy');

        Route::resource('petugas', 'PetugasController');
        Route::get('/petugas/{id}/delete', 'PetugasController@confirmDelete')->name('petugas.confirmDelete');
        Route::delete('/petugas/{id}', 'PetugasController@destroy')->name('petugas.destroy');


        Route::get('laporan', 'AdminController@laporan')->name('laporan.index');
        Route::get('laporan/cetak', 'AdminController@cetak');
        Route::get('pengaduan/cetak/{id}', 'AdminController@pdf');

    });

// Masyarakat
Route::prefix('user')
    ->middleware(['auth', 'MasyarakatMiddleware'])
    ->group(function () {
        Route::get('/', 'MasyarakatController@index')->name('masyarakat-dashboard');
        Route::resource('pengaduan', 'MasyarakatController');
        Route::get('pengaduan', 'MasyarakatController@lihat');
        Route::delete('masyarakat/{id}', 'MasyarakatController@destroy')->name('masyarakat.destroy');
    });

require __DIR__ . '/auth.php';
