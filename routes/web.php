<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

// Route Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// Route yang membutuhkan login
Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Surat Masuk: melihat daftar dan detail
    Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
    Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->whereNumber('id')->name('surat-masuk.show');

    // Surat Masuk: pengelolaan khusus petugas
    Route::middleware('can:manage-letters')->group(function () {
        Route::get('/surat-masuk/create', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
        Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
        Route::get('/surat-masuk/{id}/edit', [SuratMasukController::class, 'edit'])->whereNumber('id')->name('surat-masuk.edit');
        Route::put('/surat-masuk/{id}', [SuratMasukController::class, 'update'])->whereNumber('id')->name('surat-masuk.update');
        Route::delete('/surat-masuk/{id}', [SuratMasukController::class, 'destroy'])->whereNumber('id')->name('surat-masuk.destroy');
    });

    // Surat Keluar: melihat daftar dan detail
    Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
    Route::get('/surat-keluar/{id}', [SuratKeluarController::class, 'show'])->whereNumber('id')->name('surat-keluar.show');

    // Surat Keluar: pengelolaan khusus petugas
    Route::middleware('can:manage-letters')->group(function () {
        Route::get('/surat-keluar/create', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
        Route::post('/surat-keluar', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
        Route::get('/surat-keluar/{id}/edit', [SuratKeluarController::class, 'edit'])->whereNumber('id')->name('surat-keluar.edit');
        Route::put('/surat-keluar/{id}', [SuratKeluarController::class, 'update'])->whereNumber('id')->name('surat-keluar.update');
        Route::delete('/surat-keluar/{id}', [SuratKeluarController::class, 'destroy'])->whereNumber('id')->name('surat-keluar.destroy');
    });
});
