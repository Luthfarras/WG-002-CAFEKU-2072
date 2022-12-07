<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;

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

Route::middleware(['auth'])->group(function () {
    // memberi akses hanya kepada user yang telah login
    Route::resource('kategori', KategoriController::class);
    Route::resource('menu', MenuController::class);
});

Route::middleware(['auth', 'owner'])->group(function () {
    // memberi akses hanya kepada user dengan role owner
    Route::resource('user', UserController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    // memberi akses hanya kepada user dengan role admin
    Route::get('dashboard', [HomeController::class, 'dashboard']);
    Route::post('dashboard', [HomeController::class, 'store']);
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');