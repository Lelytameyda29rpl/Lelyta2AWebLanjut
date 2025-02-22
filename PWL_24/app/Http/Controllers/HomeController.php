<?php

// Mendefinisikan namespace untuk controller ini agar sesuai dengan struktur Laravel.
// Namespace ini menunjukkan bahwa PageController berada dalam folder "app/Http/Controllers".
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel yang bisa digunakan untuk menangani input dari pengguna.
// Meskipun tidak digunakan dalam metode ini, bisa berguna untuk metode lain di controller.
use Illuminate\Http\Request;

// Mendefinisikan kelas HomeController yang merupakan turunan dari kelas Controller utama Laravel.
// Controller ini digunakan untuk menangani beberapa halaman dalam aplikasi.
class HomeController extends Controller
{
    public function __invoke() { 
        // Mendefinisikan metode index() yang akan menangani permintaan untuk halaman utama.

        return 'Selamat Datang'; 
        // Mengembalikan teks "Selamat Datang" sebagai respons ketika metode ini dipanggil.

    }
}
