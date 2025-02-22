<?php

namespace App\Models; // Menentukan namespace model agar bisa digunakan di berbagai bagian aplikasi

use Illuminate\Database\Eloquent\Factories\HasFactory; // Menggunakan trait HasFactory untuk mendukung pembuatan model dengan factory
use Illuminate\Database\Eloquent\Model; // Menggunakan kelas Model dari Eloquent untuk menghubungkan model dengan database

// Mendefinisikan model Item yang mewakili tabel "items" di database
class Item extends Model
{
    use HasFactory; // Menggunakan HasFactory untuk mempermudah pembuatan data uji (seeding) menggunakan factory
    protected $fillable = [ // Menentukan kolom yang boleh diisi secara massal (mass assignment)
        'name', // Kolom "name" dapat diisi dengan mass assignment
        'description', // Kolom "description" dapat diisi dengan mass assignment
    ];
}