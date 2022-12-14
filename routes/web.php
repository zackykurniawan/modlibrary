<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    // crud buku
    Route::resource('buku', BukuController::class);
    Route::get('delbuk/{buku}', [BukuController::class, 'destroy']);

    //crud kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('delkat/{kategori}', [KategoriController::class, 'destroy']);
});

// halaman beranda
Route::get('/', [BukuController::class, 'tampil']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
