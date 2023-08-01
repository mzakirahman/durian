<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [App\Http\Controllers\HitungController::class, 'index'])->name('/');
Route::get('/dashboard', [App\Http\Controllers\HitungController::class, 'index'])->name('/');
Route::get('/result', function () {
    return view('hitung.result');
});


Auth::routes();
Route::get('/', function(){
    return view('dashboard');
}); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kriteria', [App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria');
Route::get('/kriteria/get-data', [App\Http\Controllers\KriteriaController::class, 'show'])->name('kriteria/get-data');
Route::post('/kriteria/tambah-data/proses', [App\Http\Controllers\KriteriaController::class, 'store'])->name('kriteria/tambah-data/proses');
Route::post('/kriteria/edit-data/proses', [App\Http\Controllers\KriteriaController::class, 'update'])->name('kriteria/edit-data/proses');
Route::get('/kriteria/data/hapus/{id}', [App\Http\Controllers\KriteriaController::class, 'destroy'])->name('kriteria/data/hapus');

Route::get('/value-set', [App\Http\Controllers\ValueSetController::class, 'index'])->name('value-set');
Route::get('/value-set/get-data', [App\Http\Controllers\ValueSetController::class, 'show'])->name('value-set/get-data');
Route::post('/value-set/tambah-data/proses', [App\Http\Controllers\ValueSetController::class, 'store'])->name('value-set/tambah-data/proses');
Route::post('/value-set/edit-data/proses', [App\Http\Controllers\ValueSetController::class, 'update'])->name('value-set/edit-data/proses');
Route::get('/value-set/data/hapus/{id}', [App\Http\Controllers\ValueSetController::class, 'destroy'])->name('value-set/data/hapus');

Route::get('/bobot-selisih', [App\Http\Controllers\BobotSelisihController::class, 'index'])->name('bobot-selisih');
Route::get('/bobot-selisih/get-data', [App\Http\Controllers\BobotSelisihController::class, 'show'])->name('bobot-selisih/get-data');
Route::post('/bobot-selisih/tambah-data/proses', [App\Http\Controllers\BobotSelisihController::class, 'store'])->name('bobot-selisih/tambah-data/proses');
Route::post('/bobot-selisih/edit-data/proses', [App\Http\Controllers\BobotSelisihController::class, 'update'])->name('bobot-selisih/edit-data/proses');
Route::get('/bobot-selisih/data/hapus/{id}', [App\Http\Controllers\BobotSelisihController::class, 'destroy'])->name('bobot-selisih/data/hapus');

Route::get('/data-uji', [App\Http\Controllers\DataUjiController::class, 'index'])->name('data-uji');
Route::get('/data-uji/get-data', [App\Http\Controllers\DataUjiController::class, 'show'])->name('data-uji/get-data');
Route::post('/data-uji/tambah-data/proses', [App\Http\Controllers\DataUjiController::class, 'store'])->name('data-uji/tambah-data/proses');
Route::post('/data-uji/edit-data/proses', [App\Http\Controllers\DataUjiController::class, 'update'])->name('data-uji/edit-data/proses');
Route::get('/data-uji/data/hapus/{id}', [App\Http\Controllers\DataUjiController::class, 'destroy'])->name('data-uji/data/hapus');

Route::group(['middleware'=>'auth'],function(){
Route::get('/detailDTU', [App\Http\Controllers\MDetailDataUjiController::class, 'index'])->name('detailDTU');
Route::post('/detailDTU/tambah-data/proses', [App\Http\Controllers\MDetailDataUjiController::class, 'store'])->name('detailDTU/tambah-data/proses');
Route::post('/detailDTU/edit-data/proses', [App\Http\Controllers\MDetailDataUjiController::class, 'update'])->name('detailDTU/edit-data/proses');
Route::get('/detailDTU/data/hapus/{id}', [App\Http\Controllers\MDetailDataUjiController::class, 'destroy'])->name('detailDTU/data/hapus');
});

Route::get('/detailDTU/get-data', [App\Http\Controllers\MDetailDataUjiController::class, 'show'])->name('detailDTU/get-data');
Route::get('/detailDTUlist', [App\Http\Controllers\MDetailDataUjiController::class, 'indexDetail'])->name('detailDTUlist');
Route::get('/hitung', [App\Http\Controllers\HitungController::class, 'index'])->name('hitung');
Route::post('/hitung/tambah-data/proses', [App\Http\Controllers\HitungController::class, 'store'])->name('hitung/tambah-data/proses');
Route::get('/hitung/get-data', [App\Http\Controllers\HitungController::class, 'show'])->name('hitung/get-data');