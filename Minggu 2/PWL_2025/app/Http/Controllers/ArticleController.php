<?php
// Mendefinisikan namespace untuk controller ini agar sesuai dengan struktur Laravel.
// Namespace ini menunjukkan bahwa PageController berada dalam folder "app/Http/Controllers".
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel yang bisa digunakan untuk menangani input dari pengguna.
// Meskipun tidak digunakan dalam metode ini, bisa berguna untuk metode lain di controller.
use Illuminate\Http\Request;

// Mendefinisikan kelas ArticleController yang merupakan turunan dari kelas Controller utama Laravel.
// Controller ini digunakan untuk menangani beberapa halaman dalam aplikasi.
class ArticleController extends Controller
{
    public function __invoke($id) { 
        // Mendefinisikan metode articles() yang menerima satu parameter, yaitu ID artikel.

        return 'Halaman Artikel dengan ID ' . $id; 
        // Mengembalikan teks yang menunjukkan halaman artikel dengan ID yang diterima dari URL.

    }
}
