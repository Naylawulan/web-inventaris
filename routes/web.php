<?php

use App\Http\Controllers\SessionController;
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
Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);
Route::resource('/barang', \App\Http\Controllers\BarangController::class);
Route::resource('/peminjaman', \App\Http\Controllers\PeminjamanController::class);

Route::get('/sesi',[SessionController::class, 'index']);
Route::get('/sesi/logout',[SessionController::class, 'logout']);
Route::post('/sesi/login',[SessionController::class, 'login']);
Route::get('/sesi/register',[SessionController::class, 'register']);
Route::post('/sesi/create',[SessionController::class, 'create']);

