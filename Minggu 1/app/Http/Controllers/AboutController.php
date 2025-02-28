<?php
// Mendefinisikan namespace untuk controller ini agar sesuai dengan struktur Laravel.
// Namespace ini menunjukkan bahwa PageController berada dalam folder "app/Http/Controllers".
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel yang bisa digunakan untuk menangani input dari pengguna.
// Meskipun tidak digunakan dalam metode ini, bisa berguna untuk metode lain di controller.
use Illuminate\Http\Request;

// Mendefinisikan kelas AboutController yang merupakan turunan dari kelas Controller utama Laravel.
// Controller ini digunakan untuk menangani beberapa halaman dalam aplikasi.
class AboutController extends Controller
{
    public function __invoke() { 
        // Mendefinisikan metode about() yang akan menangani permintaan untuk halaman "about".

        return 'Nama: Lelyta Meyda Ayu Budiyanti <br> NIM: 2341720124'; 
        // Mengembalikan teks yang berisi nama dan NIM sebagai respons.
        // "<br>" digunakan untuk membuat baris baru dalam tampilan HTML.

    }
}
