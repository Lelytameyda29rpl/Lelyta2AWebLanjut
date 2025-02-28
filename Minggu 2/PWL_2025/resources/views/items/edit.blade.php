<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title> <!-- Menentukan judul halaman di tab browser -->
</head>
<body>
    <h1>Edit Item</h1> <!-- Judul utama halaman -->

    <!-- Form untuk mengedit item yang sudah ada -->
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf <!-- Token CSRF untuk keamanan agar terhindar dari serangan Cross-Site Request Forgery -->
        @method('PUT') <!-- Mengubah metode request menjadi PUT untuk update data -->

        <!-- Input untuk nama item -->
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" required> 
        <!-- Mengisi input dengan data item yang ada dan wajib diisi -->

        <br>

        <!-- Input untuk deskripsi item -->
        <label for="description">Description:</label>
        <textarea name="description" required>{{ $item->description }}</textarea> 
        <!-- Mengisi textarea dengan data item yang ada dan wajib diisi -->

        <br>

        <!-- Tombol untuk mengupdate item -->
        <button type="submit">Update Item</button>
    </form>

    <!-- Link untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Back to List</a>
</body>
</html>
