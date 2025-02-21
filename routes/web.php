<?php

// Menggunakan namespace yang diperlukan untuk routing
use Illuminate\Support\Facades\Route;
// Mengimpor ItemController agar bisa digunakan dalam routing
use App\Http\Controllers\ItemController;
// Mengimpor WelcomeController agar bisa digunakan dalam routing
use App\Http\Controllers\WelcomeController;
// Mengimpor PageController agar bisa digunakan dalam routing
use App\Http\Controllers\PageController;
// Mengimpor HomeController agar bisa digunakan dalam routing
use App\Http\Controllers\HomeController;
// Mengimpor AboutController agar bisa digunakan dalam routing
use App\Http\Controllers\AboutController;
// Mengimpor ArticleController agar bisa digunakan dalam routing
use App\Http\Controllers\ArticleController;
// Mengimpor PhotoController agar bisa digunakan dalam routing
use App\Http\Controllers\PhotoController;


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
Route::get('/hello', [WelcomeController::class,'hello']);

// Mendefinisikan rute GET dengan URL '/index'
Route::get('/', [PageController::class,'index']);

// Mendefinisikan rute GET dengan URL '/about'
Route::get('/about', [PageController::class,'about']);

// Mendefinisikan rute GET dengan URL '/articles'
Route::get('/articles/{id}', [PageController::class,'articles']);

// Mendefinisikan rute GET dengan URL '/'
Route::get('/', HomeController::class);

// Mendefinisikan rute GET dengan URL '/about'
Route::get('/about', AboutController::class);

// Mendefinisikan rute GET dengan URL '/article'
Route::get('/article/{id}', ArticleController::class);

// Mendefinisikan resource route untuk PhotoController
Route::resource('photos', PhotoController::class);

// Mendefinisikan resource route untuk PhotoController, tetapi hanya menggunakan metode 'index' dan 'show'
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

// Mendefinisikan resource route untuk PhotoController, tetapi mengecualikan metode 'create', 'store', 'update', dan 'destroy'
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

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

// Mendefinisikan rute GET dengan URL '/greeting'
Route::get('/greeting', function () {
    return view('hello', ['name' => 'Lelyta']);
    });
    
// Route resource untuk ItemController yang secara otomatis membuat route CRUD (index, create, store, show, edit, update, destroy)
Route::resource('items', ItemController::class);