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

// Mendefinisikan rute GET dengan URL '/hello'
Route::get('/hello', function () { 
    // Mengembalikan tampilan (view) dengan nama 'Hello World'
    return ('Hello World');  
});

// Mendefinisikan rute GET dengan URL '/hello'
Route::get('/world', function () {
    // Mengembalikan tampilan (view) dengan nama 'World'
    return 'World';
   });

// Mendefinisikan rute GET untuk URL utama ('/')
Route::get('/', function () { 
    // Mengembalikan teks 'Selamat Datang' sebagai respons langsung
    return ('Selamat Datang');  
});

// Mendefinisikan rute GET untuk URL '/about'
Route::get('/about', function () { 
    // Mengembalikan teks 'NIM: 2341720124' dan Nama: Lelyta Meyda Ayu Budiyanti sebagai respons langsung
    return ('NIM: 2341720124 <br> Nama: Lelyta Meyda Ayu Budiyanti'); 
});

// Mendefinisikan rute GET dengan parameter dinamis {Lelyta}
Route::get('/user/{name}', function ($name) {
    // Mengembalikan teks "Nama saya {name}" dengan nilai dari parameter URL
    return 'Nama saya '.$name;
    });

// Mendefinisikan rute GET dengan dua parameter dinamis: {post} dan {comment}
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) { 
    // Mengembalikan teks dengan format "Pos ke-{postId} Komentar ke-{commentId}"
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId; 
});

// Mendefinisikan rute GET dengan parameter dinamis {id}
Route::get('/articles/{id} ', function ($id) {
    // Mengembalikan teks "Halaman Artikel dengan ID {id}" dengan nilai dari parameter URL
    return 'Halaman Artikel dengan ID '.$id;
    });

// Mendefinisikan rute GET dengan parameter opsional {name}
Route::get('/user/{name?}', function ($name = null) { 
    // Mengembalikan teks "Nama saya {name}", jika parameter kosong akan tetap mencetak "Nama saya "
    return 'Nama saya '.$name;
});

// Mendefinisikan rute GET dengan parameter opsional {name}
Route::get('/user/{name?}', function ($name = 'John') { 
    // Mengembalikan teks "Nama saya {name}", jika parameter tidak diisi, defaultnya adalah 'John'
    return 'Nama saya '.$name;
});

// Route resource untuk ItemController yang secara otomatis membuat route CRUD (index, create, store, show, edit, update, destroy)
Route::resource('items', ItemController::class);