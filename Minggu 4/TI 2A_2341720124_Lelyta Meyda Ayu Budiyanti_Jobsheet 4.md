# 🏫 Data Diri

- Nama: Lelyta Meyda Ayu Budiyanti <br>
- NIM: 2341720124 <br>
- Kelas: TI 2A <br>
- Absen: 15 <br>
- Mata Kuliah: Pemrograman Web Lanjut <br>
- Pertemuan: Pertemuan Ke-4 (Jobsheet 4) <br>

## ⚙️ Praktikum 1 - $fillable: 

3. Telah dilakukannya penambahan kode program &fiilable pada file UseModel.php dan penambahan pada file UserController.php, dan berikut adalah hasilnya:

<img src="gambar/langkah 3 praktikum1.png" width="300">

- Keterangan: Jika semua kode telah ditambahkan dan benar, maka kode ini akan berhasil menambahkan user baru berupa Manager 2 ke database dan menampilkan semua user di halaman user.blade.php.

6. Telah dilakukannya modifikasi pada file UseModel.php dan file UserController.php, dan berikut adalah hasilnya:

<img src="gambar/langkah 6 praktikum 1.png" width="300">

- Keterangan: Error Error "SQLSTATE[HY000]: General error: 1364 Field 'password' doesn't have a default value" terjadi karena kolom password di tabel m_user tidak diisi dengan nilai saat mencoba melakukan UserModel::create($data); tetapi di database, kolom ini tidak diatur untuk menerima NULL atau tidak memiliki default value.

## ⚙️ Praktikum 2.1 – Retrieving Single Models:

3. Telah dilakukannya modifikasi pada file UserController.php dan file user.blade.php, dan berikut adalah hasilnya:

<img src="gambar/langkah 3 praktikum 2.1.png" width="300">

- Keterangan: Jika kode program dijalankan, kemudian user_id = 1 ada di database maka data user akan ditampilkan dalam tabel.

5. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 5 praktikum 2.1.png" width="300">

- Keterangan: Jika kode dijalankan maka kode ini akan mencari satu user pertama yang memiliki level_id = 1 di tabel m_user dan kemudian mengirimkannya ke view user.blade.php.

7. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 7 praktikum 2.1.png" width="300">

- Keterangan: Jika kode dijalankan, dan jika user ditemukan maka data user dapat ditampilkan di dalam tabel.

9. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 8 praktikum 2.1.png" width="300">

- Keterangan: Jika kode dijalankan, maka akan dicarinya user dengan user_id = 1, jika ditemukan hanya kolom username dan nama yang akan diambil.

11. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 10 praktikum 2.1.png" width="300">

Keterangan: Jika kode dijalankan, maka akan dicarinya user dengan user_id = 20, data tidak ditemukan pada database, maka yang ditampilkan adalah "404" Not Found.

## ⚙️ Praktikum 2.2 – Not Found Exceptions 

2. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 2 praktikum 2.2.png" width="300">

- Keterangan: Kode langkah di atas menggunakan findOrFail(1), yang berarti akan mencari user dengan user_id = 1 di database.

4. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 4 praktikum 2.2.png" width="300">

- Keterangan: Kode langkah di atas menggunakan firstOrFail(), yang berarti akan mencari user dengan username = 'manager9' di database. Dan username tersebut tidak ditemukan, sehingga yang ditampilkan adalah 404 Not Found.

## ⚙️ Praktikum 2.3 – Retreiving Aggregrates  

2. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 2 praktikum 2.3.png" width="300">

- Keterangan: Kode di atas menggunakan count(), yang berarti akan menghitung jumlah user dengan level_id = 2 di database.

4. Telah dilakukannya modifikasi pada file UserController dan user.blade.php, berikut adalah hasilnya:

<img src="gambar/langkah 4 praktikum 2.3.png" width="300">

## ⚙️ Praktikum 2.4 – Retreiving or Creating Models

3. Telah dilakukannya modifikasi pada file UserController dan user.blade.php, berikut adalah hasilnya:

<img src="gambar/langkah 3 praktikum 2.4.png" width="300">

- Keterangan: Kode di atas menggunakan firstOrCreate(), yang berarti akan mencari user dengan username = 'manager' di database dan kemudian dikirim ke view user.blade.php. Jika user tersebut tidak ditemukan, maka akan otomatis membuat user baru dengan nama "Manager".

5. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 5 praktikum 2.4.png" width="300">
<img src="gambar/langkah 5.2 praktikum 2.4.png" width="300">

- Keterangan: Kode di atas menggunakan firstOrCreate(), yang berarti akan mencari user dengan username = 'manager22' di database. Jika user belum ada, maka akan membuat user baru dengan data yang diberikan.

7. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 7 praktikum 2.4.png" width="300">

- Keterangan: Kode ini menggunakan firstOrNew(), dimana akan mencari data username = manager dan nama = Manager di database, tetapi tidak langsung menyimpan ke database jika tidak ditemukan.

9. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 9 praktikum 2.4.png" width="300">
<img src="gambar/langkah 9.2 praktikum 2.4.png" width="300">

- Keterangan: Kode di atas menggunakan firstOrNew(), yang berarti akan mencari user dengan username = 'manager33' di tabel m_user. Laravel hanya mengambil data user dari database. Tidak ada perubahan di phpMyAdmin. Tabel m_user tetap seperti sebelumnya.

11. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 11 praktikum 2.4.png" width="300">
<img src="gambar/langkah 11.2 praktikum 2.4.png" width="300">

- Keterangan: Jika User username = 'manager33' sudah ada hanya mengambil user tersebut dari database. Data username manager33 muncul pada phpMyAdmin.

## ⚙️ Praktikum 2.5 – Attribute Changes 

2. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 2 praktikum 2.5.png" width="300">

- Keterangan: isDirty() membantu mengecek apakah ada perubahan sebelum save(), isClean() membantu mengecek apakah tidak ada perubahan. Setelah save(), perubahan tersimpan dan isDirty() kembali false.

4. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 4 praktikum 2.5.png" width="300">

- Keterangan: wasChanged() berguna untuk mengecek apakah ada perubahan setelah save(). Hasilnya true jika field berubah setelah penyimpanan. Jika tidak ada perubahan, hasilnya false.

## ⚙️ Praktikum 2.6 – Create, Read, Update, Delete (CRUD) 

3. Telah dilakukannya modifikasi pada file UserController dan berikut adalah hasilnya:

<img src="gambar/langkah 3 praktikum 2.6.png" width="300">

- Keterangan: Semua data user dari tabel m_user akan ditampilkan dalam bentuk tabel di browser.
Ada tombol "Tambah User", "Ubah", dan "Hapus".
Link hapus memiliki konfirmasi sebelum menghapus data.

7. Telah dilakukannya modifikasi pada file UserController.php, user.blade.php, penambahan view user_tambah.blade.php, dan penambahan route, maka berikut adalah hasilnya:

<img src="gambar/langkah 7 praktikum 2.6.png" width="300">
<img src="gambar/langkah 7.2 praktikum 2.6.png" width="300">

- Keterangan: Akan ditampilkannya pada browser tabel data user dengan adanya link tambah, ubah, dan hapus. Pengguna dapat mengklik url tambah user dan memasukkan data user.

10. Telah dilakukannya modifikasi pada file UserController.php dan web.php, maka berikut adalah hasilnya: 

<img src="gambar/langkah 10.2 praktikum 2.6.png" width="300">
<img src="gambar/langkah 10.3 praktikum 2.6.png" width="300">

- Keterangan: Ketika kode telah ditambahkan maka dapat berhasil untuk menambahkan data user dan akan tampil pada bagian view user.blade.php.

14. Telah dilakukannya modifikasi pada file UserController.php, view dan web.php, maka berikut adalah hasilnya: 

<img src="gambar/langkah 14 praktikum 2.6.png" width="300">
<img src="gambar/langkah 14.2 praktikum 2.6.png" width="300">

- Keterangan: Pada langkah ini url ubah_simpan masih belum dapat berfungsi.

17. Telah dilakukannya modifikasi pada file UserController.php, view dan web.php, maka berikut adalah hasilnya: 

<img src="gambar/langkah 17 praktikum 2.6.png" width="300">
<img src="gambar/langkah 17.2 praktikum 2.6.png" width="300">
<img src="gambar/langkah 17.3 praktikum 2.6.png" width="300">

- Keterangan: Pada langkah ini telah berhasil melakukan perubahan pada bagian ID Level Pengguna yang awalnya bernilai 3 menjadi 2.

20. Telah dilakukannya modifikasi pada file UserController.php dan bagian view, maka berikut adalah hasilnya: 

<img src="gambar/langkah 20 praktikum 2.6.png" width="300">
<img src="gambar/langkah 20.2 praktikum 2.6.png" width="300">

- Keterangan: Pada langkah ini telah berhasil menghapus data dengan user_id = 13.

## ⚙️ Praktikum 2.7 – Relationships 

3. Telah dimodifikasinya file UserController.php, userModel, dan penambahan file LevelMode.php, maka berikut adalah hasilnya: 

<img src="gambar/langkah 20.2 praktikum 2.6.png" width="300">

- Keterangan: Telah berhasil menampilkan data user pada tampilan berbentuk tabel.

6. Telah dilakukannya modifikasi pada file UserController dan user.blade.php, maka berikut adalah hasilnya:

<img src="gambar/langkah 6 praktikum 2.7.png" width="300">

- Keterangan: Telah berhasil menampilkan data user dengan tambahan kode level dan nama level.