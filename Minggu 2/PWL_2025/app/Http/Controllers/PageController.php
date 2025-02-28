<?php
// Menentukan bahwa file ini adalah skrip PHP

namespace App\Http\Controllers;
// Mendefinisikan namespace untuk controller ini agar sesuai dengan struktur Laravel.
// Namespace ini menunjukkan bahwa PageController berada dalam folder "app/Http/Controllers".

use Illuminate\Http\Request;
// Mengimpor class Request dari Laravel yang bisa digunakan untuk menangani input dari pengguna.
// Meskipun tidak digunakan dalam metode ini, bisa berguna untuk metode lain di controller.

class PageController extends Controller
// Mendefinisikan kelas PageController yang merupakan turunan dari kelas Controller utama Laravel.
// Controller ini digunakan untuk menangani beberapa halaman dalam aplikasi.

{
    public function index() { 
        // Mendefinisikan metode index() yang akan menangani permintaan untuk halaman utama.

        return 'Selamat Datang'; 
        // Mengembalikan teks "Selamat Datang" sebagai respons ketika metode ini dipanggil.

    }

    public function about() { 
        // Mendefinisikan metode about() yang akan menangani permintaan untuk halaman "about".

        return 'Nama: Lelyta Meyda Ayu Budiyanti <br> NIM: 2341720124'; 
        // Mengembalikan teks yang berisi nama dan NIM sebagai respons.
        // "<br>" digunakan untuk membuat baris baru dalam tampilan HTML.

    }

    public function articles($id) { 
        // Mendefinisikan metode articles() yang menerima satu parameter, yaitu ID artikel.

        return 'Halaman Artikel dengan ID ' . $id; 
        // Mengembalikan teks yang menunjukkan halaman artikel dengan ID yang diterima dari URL.

    }

}

