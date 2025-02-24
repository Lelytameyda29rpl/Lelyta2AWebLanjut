<?php

// Menggunakan namespace yang diperlukan untuk migration
use Illuminate\Database\Migrations\Migration; // Class dasar untuk membuat migration
use Illuminate\Database\Schema\Blueprint; // Class untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Facade untuk manipulasi schema database

// Mengembalikan instance dari kelas anonim yang memperluas Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */

     // Method untuk menjalankan migration (membuat tabel)
    public function up(): void
    {

        // Membuat tabel 'items' di database
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Membuat kolom ID sebagai primary key dengan auto-increment
            $table->string('name'); // Membuat kolom 'name' dengan tipe data string
            $table->text('description'); // Membuat kolom 'description' dengan tipe data text
            $table->timestamps(); // Menambahkan kolom 'created_at' dan 'updated_at' secara otomatis
        });
    }

    /**
     * Reverse the migrations.
     */

    // Method untuk membatalkan migration (menghapus tabel)
    public function down(): void
    {

        // Menghapus tabel 'items' jika perlu rollback
        Schema::dropIfExists('items');
    }
};
