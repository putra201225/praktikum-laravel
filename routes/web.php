
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

// Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Surat Masuk
Route::resource('surat-masuk', SuratMasukController::class)
    ->parameters(['surat-masuk' => 'id']);

// Surat Keluar
Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])
    ->name('surat-keluar.index');

Route::get('/surat-keluar/{id}', [SuratKeluarController::class, 'show'])
    ->whereNumber('id')
    ->name('surat-keluar.show');
