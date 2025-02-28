<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title> <!-- Menentukan judul halaman di tab browser -->
</head>
<body>
    <h1>Add Item</h1> <!-- Judul utama halaman -->

    <!-- Form untuk menambahkan item baru -->
    <form action="{{ route('items.store') }}" method="POST">
        @csrf <!-- Token CSRF untuk keamanan agar terhindar dari serangan Cross-Site Request Forgery -->

        <!-- Input untuk nama item -->
        <label for="name">Name:</label>
        <input type="text" name="name" required> <!-- Input teks untuk nama item, wajib diisi -->
        <br>

        <!-- Input untuk deskripsi item -->
        <label for="description">Description:</label>
        <textarea name="description" required></textarea> <!-- Textarea untuk deskripsi item, wajib diisi -->
        <br>

        <!-- Tombol untuk mengirim data ke server -->
        <button type="submit">Add Item</button>
    </form>

    <!-- Link untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Back to List</a>
</body>
</html>
