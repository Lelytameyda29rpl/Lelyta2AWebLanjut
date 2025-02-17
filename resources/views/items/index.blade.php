<!DOCTYPE html>
<html>
<head>
    <title>Item List</title> <!-- Menentukan judul halaman di tab browser -->
</head>
<body>
    <h1>Items</h1> <!-- Judul utama halaman -->

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <p>{{ session('success') }}</p> <!-- Menampilkan pesan sukses dari session -->
    @endif

    <!-- Link untuk menambahkan item baru -->
    <a href="{{ route('items.create') }}">Add Item</a>

    <ul>
        <!-- Melakukan iterasi terhadap daftar items yang dikirim dari controller -->
        @foreach ($items as $item)
            <li>
                {{ $item->name }} -  <!-- Menampilkan nama item -->

                <!-- Link untuk mengedit item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a>

                <!-- Form untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf <!-- Token CSRF untuk keamanan agar terhindar dari serangan CSRF -->
                    @method('DELETE') <!-- Mengubah metode menjadi DELETE untuk menghapus item -->
                    <button type="submit">Delete</button> <!-- Tombol untuk menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
