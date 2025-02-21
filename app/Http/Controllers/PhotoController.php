<?php

namespace App\Http\Controllers;
// Menentukan namespace agar Laravel dapat mengenali controller ini.

use Illuminate\Http\Request;
// Mengimpor Request yang digunakan untuk menangani input dari pengguna.

class PhotoController extends Controller
// Mendefinisikan kelas PhotoController yang merupakan turunan dari Controller utama Laravel.
// Controller ini menggunakan metode resource untuk menangani CRUD (Create, Read, Update, Delete).
{
    /**
     * Menampilkan daftar resource (foto).
     */
    public function index()
    {
        // Fungsi ini akan menangani permintaan GET ke /photos.
        // Biasanya digunakan untuk menampilkan daftar foto.
        return 'Selamat Datang, halaman ini adalah daftar photo';
    }

    /**
     * Menampilkan formulir untuk membuat resource baru.
     */
    public function create()
    {
        // Fungsi ini akan menangani permintaan GET ke /photos/create.
        // Biasanya digunakan untuk menampilkan form tambah foto baru.
    }

    /**
     * Menyimpan resource yang baru dibuat ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        // Fungsi ini akan menangani permintaan POST ke /photos.
        // Biasanya digunakan untuk menyimpan data foto yang baru ke database.
    }

    /**
     * Menampilkan resource yang ditentukan berdasarkan ID.
     */
    public function show(string $id)
    {
        // Fungsi ini akan menangani permintaan GET ke /photos/{id}.
        // Digunakan untuk menampilkan detail foto berdasarkan ID yang diberikan.
    }

    /**
     * Menampilkan formulir untuk mengedit resource yang ditentukan.
     */
    public function edit(string $id)
    {
        // Fungsi ini akan menangani permintaan GET ke /photos/{id}/edit.
        // Digunakan untuk menampilkan form edit foto berdasarkan ID.
    }

    /**
     * Memperbarui resource yang ditentukan dalam penyimpanan.
     */
    public function update(Request $request, string $id)
    {
        // Fungsi ini akan menangani permintaan PUT atau PATCH ke /photos/{id}.
        // Digunakan untuk memperbarui data foto berdasarkan ID yang diberikan.
    }

    /**
     * Menghapus resource yang ditentukan dari penyimpanan.
     */
    public function destroy(string $id)
    {
        // Fungsi ini akan menangani permintaan DELETE ke /photos/{id}.
        // Digunakan untuk menghapus data foto berdasarkan ID yang diberikan.
    }
}
