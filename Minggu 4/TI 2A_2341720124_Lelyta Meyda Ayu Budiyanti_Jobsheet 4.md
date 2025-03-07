# 🏫 Data Diri

- Nama: Lelyta Meyda Ayu Budiyanti <br>
- NIM: 2341720124 <br>
- Kelas: TI 2A <br>
- Absen: 15 <br>
- Mata Kuliah: Pemrograman Web Lanjut <br>

## 🛠️ Praktikum 1 - $fillable: 

3. Telah dilakukannya penambahan kode program &fiilable pada file UseModel.php dan penambahan pada file UserController.php, dan berikut adalah hasilnya:

<img src="gambar/langkah 3 praktikum1.png" width="300">

- Keterangan: Jika semua kode telah ditambahkan dan benar, maka kode ini akan berhasil menambahkan user baru berupa Manager 2 ke database dan menampilkan semua user di halaman user.blade.php.

6. Telah dilakukannya modifikasi pada file UseModel.php dan file UserController.php, dan berikut adalah hasilnya:

<img src="gambar/langkah 6 praktikum 1.png" width="300">

- Keterangan: Error Error "SQLSTATE[HY000]: General error: 1364 Field 'password' doesn't have a default value" terjadi karena kolom password di tabel m_user tidak diisi dengan nilai saat mencoba melakukan UserModel::create($data); tetapi di database, kolom ini tidak diatur untuk menerima NULL atau tidak memiliki default value.

## ⚙️ 