<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;

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

// Main Page Route
Route::get('/', function () {
  return view('auth.login');
});


Route::controller(AuthController::class)->group(function () {
  Route::get('register', 'register')->name('register');
  Route::post('register', 'registerSave')->name('register.save');

  Route::get('login', 'login')->name('login');
  Route::post('login', 'loginAction')->name('login.action');

  Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', fn () => redirect()->route('dashboard'));
  Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');


  Route::controller(BukuController::class)->prefix('buku')->group(function () {
    Route::get('/', 'index')->name('buku');
    Route::get('create', 'create')->name('buku.create');
    Route::post('store', 'store')->name('buku.store');
    Route::get('edit/{id}', 'edit')->name('buku.edit');
    Route::put('edit/{id}', 'update')->name('buku.update');
    Route::delete('destroy/{id}', 'destroy')->name('buku.destroy');
    Route::get('search', 'search')->name('buku.search');
  });

  Route::controller(AnggotaController::class)->prefix('anggota')->group(function () {
    Route::get('/', 'index')->name('anggota');
    Route::get('create', 'create')->name('anggota.create');
    Route::post('store', 'store')->name('anggota.store');
    Route::get('edit/{id}', 'edit')->name('anggota.edit');
    Route::put('edit/{id}', 'update')->name('anggota.update');
    Route::delete('destroy/{id}', 'destroy')->name('anggota.destroy');
    Route::get('search', 'search')->name('anggota.search');
  });

  Route::controller(PetugasController::class)->prefix('petugas')->group(function () {
    Route::get('/', 'index')->name('petugas');
    Route::get('create', 'create')->name('petugas.create');
    Route::post('store', 'store')->name('petugas.store');
    Route::get('edit/{id}', 'edit')->name('petugas.edit');
    Route::put('edit/{id}', 'update')->name('petugas.update');
    Route::delete('destroy/{id}', 'destroy')->name('petugas.destroy');
    Route::get('search', 'search')->name('petugas.search');
  });

  Route::controller(PeminjamanController::class)->prefix('peminjaman')->group(function () {
    Route::get('/', 'index')->name('peminjaman');
    Route::get('create', 'create')->name('peminjaman.create');
    Route::post('store', 'store')->name('peminjaman.store');
    Route::get('edit/{id}', 'edit')->name('peminjaman.edit');
    Route::put('edit/{id}', 'update')->name('peminjaman.update');
    Route::get('show/{id}', 'show')->name('peminjaman.show');
    Route::delete('destroy/{id}', 'destroy')->name('peminjaman.destroy');
    Route::get('search', 'search')->name('peminjaman.search');
  });

  Route::controller(PeminjamanController::class)->prefix('pengembalian')->group(function () {
    Route::get('/', 'pengembalianIndex')->name('pengembalian');
    Route::get('search', 'searchPengembalian')->name('pengembalian.search');
    Route::get('show/{id}', 'showPengembalian')->name('pengembalian.show');
    Route::post('update/{id}', 'updateStatus')->name('peminjaman.update');
  });

  Route::controller(LaporanController::class)->prefix('laporan')->group(function () {
    Route::get('/', 'index')->name('laporan');
  });


  Route::controller(TestController::class)->prefix('test')->group(function () {
    Route::get('/', 'index')->name('test');
  });
});
