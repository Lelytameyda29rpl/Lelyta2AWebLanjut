<?php

// Menentukan namespace untuk controller
namespace App\Http\Controllers;

// Mengimpor model Item untuk berinteraksi dengan database
use App\Models\Item;
// Mengimpor Request untuk menangani data dari form
use Illuminate\Http\Request;

// Mendefinisikan kelas ItemController yang mengatur logika CRUD untuk Item
class ItemController extends Controller
{
    // Method untuk menampilkan daftar semua item
    public function index()
    {
        $items = Item::all(); // Mengambil semua data item dari database
        return view('items.index', compact('items')); // Mengembalikan tampilan dengan data item
    }

    // Method untuk menampilkan form pembuatan item baru
    public function create()
    {
        return view('items.create'); // Mengembalikan tampilan form pembuatan item
    }

    // Method untuk menyimpan item baru ke database
    public function store(Request $request)
    {
        // Validasi input yang dikirim dari form
        $request->validate([
            'name' => 'required', // Name harus diisi
            'description' => 'required', // Description harus diisi
        ]);
         
        // Menyimpan data item ke database hanya dengan atribut yang diizinkan
        Item::create($request->only(['name', 'description']));

        // Redirect ke halaman daftar item dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    // Method untuk menampilkan detail item tertentu
    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Mengembalikan tampilan dengan data item tertentu
    }

    // Method untuk menampilkan form edit item tertentu
    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Mengembalikan tampilan edit dengan data item tertentu
    }

    // Method untuk memperbarui data item yang sudah ada
    public function update(Request $request, Item $item)
    {
        // Validasi input dari form edit
        $request->validate([
            'name' => 'required', // Name harus diisi
            'description' => 'required', // Description harus diisi
        ]);
         
        // Mengupdate data item hanya dengan atribut yang diizinkan
        $item->update($request->only(['name', 'description']));

        // Redirect ke halaman daftar item dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    // Method untuk menghapus item dari database
    public function destroy(Item $item)
    {
        $item->delete(); // Menghapus item dari database

        // Redirect ke halaman daftar item dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
