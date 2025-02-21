<?php

// Mendefinisikan namespace untuk controller ini agar sesuai dengan struktur Laravel.
// Namespace ini menunjukkan bahwa WelcomeController berada dalam folder "app/Http/Controllers".
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel yang bisa digunakan untuk menangani input dari pengguna.
// Meskipun tidak digunakan dalam metode ini, bisa berguna untuk metode lain di controller.
use Illuminate\Http\Request;

// Mendefinisikan kelas WelcomeController yang merupakan turunan dari kelas Controller utama Laravel.
// Controller ini dapat digunakan untuk menangani logika terkait halaman "Welcome".
class WelcomeController extends Controller
{
    // Mendefinisikan metode hello() yang akan menangani permintaan ke rute terkait.
    public function hello() {
        // Mengembalikan teks "Hello World" sebagai respons langsung ketika metode ini dipanggil.
        return 'Hello World';
       }
}
