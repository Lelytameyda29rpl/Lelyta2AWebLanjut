<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route Home
// Route::get('/', [HomeController::class, 'index']);

// Route Products (dengan prefix "category")
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// Route User (menggunakan parameter)
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// Route Penjualan (POS)
Route::get('/sales', [SalesController::class, 'index']);

// Route LevelController
Route::get('/level', [LevelController::class, 'index']);

// Route KategoriController
Route::get('/kategori', [KategoriController::class, 'index']);

// Route UserController
Route::get('/user', [UserController::class, 'index']);

Route::get('/user/tambah', [UserController::class, 'tambah']);

Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);

Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

Route::get('user/hapus/{id}', [UserController::class, 'hapus']);

Route::get('/kategori/create', [KategoriController::class, 'create']);

Route::post('/kategori', [KategoriController::class, 'store']);

Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');

Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

Route::post('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/barang', [BarangController::class, 'index']);

Route::get('/barang/create', [BarangController::class, 'create']);

Route::post('/barang', [BarangController::class, 'store']);

Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');

Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

Route::post('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::get('/level/create', [LevelController::class, 'create']);

Route::post('/level', [LevelController::class, 'store']);

Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');

Route::put('/level/{id}', [LevelController::class, 'update'])->name('level.update');

Route::post('/level/delete/{id}', [LevelController::class, 'destroy'])->name('level.destroy');

// Route User
Route::get('/user/create', [UserController::class, 'create']); // menampilkan form add user

Route::post('/user', [UserController::class, 'store']); // menyimpan user ke database

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit'); // menampilkan form edit user

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update'); // memperbarui data user

Route::post('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy'); // menghapus user