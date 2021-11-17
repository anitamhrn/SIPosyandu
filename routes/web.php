<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PengukuranController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [DashboardController::class, 'index']);

// Route::get('/home', 'PageController@index');

//Route input Data Create Read Update Delete @resource
// Route::get('/balita', [BalitaController::class, 'balita']);

// Route::get('/balita', 'BalitaController@selectBalita');
// Route::get('/input_balita', 'BalitaController@index');


Route::resource('/balita' ,BalitaController::class);
Route::resource('/pengukuran' ,PengukuranController::class);
Route::resource('/orangtua' ,OrangTuaController::class);
Route::resource('/jadwal' ,JadwalController::class);
Route::resource('/kader' ,KaderController::class);

// Route::get('/orangtua/{$orangtua}/delete', [OrangTuaController::class, 'destroy']);
Route::post('/orangtua/{$id}/delete', [OrangTuaController::class, 'destroy']);
