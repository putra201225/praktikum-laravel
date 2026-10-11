<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
    return view('welcome');
});


// //  route sederhana 
// Route::get('/surat-masuk', function () {
//     return 'halaman surat masuk';
// });
// //  route dengan parameter
// Route::get('/surat-masuk/{id}', function ($id) {
//     return 'dtail halamman surat masuk dengan id : '.$id;
// });
// // penaaman route
// Route::get('/surat-masuk/{id}', function ($id) {
//     return 'dtail halamman surat masuk dengan id : '.$id;
// })->name('surat-masuk.show');
// cek name route
// php artisan route:list

Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');