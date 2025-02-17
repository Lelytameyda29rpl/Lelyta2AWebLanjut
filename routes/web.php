<?php

// Menggunakan namespace yang diperlukan untuk routing
use Illuminate\Support\Facades\Route;
// Mengimpor ItemController agar bisa digunakan dalam routing
use App\Http\Controllers\ItemController;

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

// Route untuk halaman utama ('/') yang akan menampilkan tampilan 'welcome'
Route::get('/', function () {
    return view('welcome'); // Mengembalikan tampilan welcome.blade.php
});

// Route resource untuk ItemController yang secara otomatis membuat route CRUD (index, create, store, show, edit, update, destroy)
Route::resource('items', ItemController::class);