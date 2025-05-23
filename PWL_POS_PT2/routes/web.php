<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);

// Route::get('/user', [UserController::class, 'index']);

// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);


// Route::get('/', [WelcomeController::class, 'index']);

// Route::group(['prefix' => 'user'], function () {
//     Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal user
//     Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
//     Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
//     Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
//     Route::get('/create_ajax', [UserController::class,'create_ajax']); // menampilkan halaman form tambah user ajax
//     Route::post('/ajax', [UserController::class,'store_ajax']); // menyimpan data user ajax
//     Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail user
//     Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
//     Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data user
//     Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // menampilkan halaman form edit user ajax
//     Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // menyimpan perubahan data user ajax
//     Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete user ajax
//     Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // menghapus data user ajax
//     Route::get('/{id}/show_ajax', [UserController::class,'show_ajax']); // menampilkan detail user ajax
//     Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
// });

// Route::group(['prefix' => 'level'], function () {
//     Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal level
//     Route::post('/list', [LevelController::class, 'list']); // menampilkan data level dalam bentuk json untuk datatables
//     Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah level
//     Route::post('/', [LevelController::class, 'store']); // menyimpan data level baru
//     Route::get('/create_ajax', [LevelController::class,'create_ajax']); // menampilkan halaman form tambah level ajax
//     Route::post('/ajax', [LevelController::class,'store_ajax']); // menyimpan data levelajax
//     Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail level
//     Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit level
//     Route::put('/{id}', [LevelController::class, 'update']); // menyimpan perubahan data level
//     Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // menampilkan halaman form edit level ajax
//     Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // menyimpan perubahan data level ajax
//     Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete level ajax
//     Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // menghapus data level ajax
//     Route::get('/{id}/show_ajax', [LevelController::class,'show_ajax']); // menampilkan detail level ajax
//     Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
// });

// Route::group(['prefix' => 'kategori'], function () {
//     Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal kategori
//     Route::post('/list', [KategoriController::class, 'list']); // menampilkan data kategori dalam bentuk json untuk datatables
//     Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah kategori
//     Route::post('/', [KategoriController::class, 'store']); // menyimpan data kategori baru
//     Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah kategori ajax
//     Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data kategori baru ajax
//     Route::get('/{id}', [KategoriController::class, 'show']); // menampilkan detail kategori
//     Route::get('/{id}/edit', [KategoriController::class, 'edit']); // menampilkan halaman form edit kategori
//     Route::put('/{id}', [KategoriController::class, 'update']); // menyimpan perubahan data kategori
//     Route::get('/{id}/show_ajax', [KategoriController::class,'show_ajax']); // menampilkan detail kategori ajax
//     Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // menampilkan halaman form edit kategori ajax
//     Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // menyimpan perubahan data kategori ajax
//     Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete kategori ajax
//     Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // menghapus data kategori ajax
//     Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data kategori
// });

// Route::group(['prefix' => 'supplier'], function () {
//     Route::get('/', [SupplierController::class, 'index']); // menampilkan halaman awal supplier
//     Route::post('/list', [SupplierController::class, 'list']); // menampilkan data supplier dalam bentuk json untuk datatables
//     Route::get('/create', [SupplierController::class, 'create']); // menampilkan halaman form tambah supplier
//     Route::post('/', [SupplierController::class, 'store']); // menyimpan data supplier baru
//     Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah supplier ajax
//     Route::post('/ajax', [SupplierController::class, 'store_ajax']); // menyimpan data supplier baru ajax
//     Route::get('/{id}', [SupplierController::class, 'show']); // menampilkan detail supplier
//     Route::get('/{id}/edit', [SupplierController::class, 'edit']); // menampilkan halaman form edit supplier
//     Route::put('/{id}', [SupplierController::class, 'update']); // menyimpan perubahan data supplier
//     Route::get('/{id}/show_ajax', [SupplierController::class,'show_ajax']); // menampilkan detail supplier ajax
//     Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // menampilkan halaman form edit supplier ajax
//     Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // menyimpan perubahan data supplier ajax
//     Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete supplier ajax
//     Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // menghapus data supplier ajax
//     Route::delete('/{id}', [SupplierController::class, 'destroy']); // menghapus data supplier
// });

// Route::group(['prefix' => 'barang'], function () {
//     Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal barang
//     Route::post('/list', [BarangController::class, 'list']); // menampilkan data barang dalam bentuk json untuk datatables
//     Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah barang
//     Route::post('/', [BarangController::class, 'store']); // menyimpan data barang baru
//     Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // menampilkan halaman form tambah barang ajax
//     Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data barang baru ajax
//     Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail barang
//     Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit barang
//     Route::put('/{id}', [BarangController::class, 'update']); // menyimpan perubahan data barang
//     Route::get('/{id}/show_ajax', [BarangController::class,'show_ajax']); // menampilkan detail barang ajax
//     Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // menampilkan halaman form edit barang ajax
//     Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // menyimpan perubahan data barang ajax
//     Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete barang ajax
//     Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // menghapus data barang ajax
//     Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data barang
// });

// Route::group(['prefix' => 'stok'], function () {
//     Route::get('/', [StokController::class, 'index']); // menampilkan halaman awal stok
//     Route::post('/list', [StokController::class, 'list']); // menampilkan data stok dalam bentuk json untuk datatables
//     Route::get('/create', [StokController::class, 'create']); // menampilkan halaman form tambah stok
//     Route::post('/', [StokController::class, 'store']); // menyimpan data stok baru
//     Route::get('/create_ajax', [StokController::class, 'create_ajax']); // menampilkan halaman form tambah stok ajax
//     Route::post('/ajax', [StokController::class, 'store_ajax']); // menyimpan data stok baru ajax
//     Route::get('/{id}', [StokController::class, 'show']); // menampilkan detail stok
//     Route::get('/{id}/edit', [StokController::class, 'edit']); // menampilkan halaman form edit stok
//     Route::put('/{id}', [StokController::class, 'update']); // menyimpan perubahan data stok
//     Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']); // menampilkan detail stok ajax
//     Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']); // menampilkan halaman form edit stok ajax
//     Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']); // menyimpan perubahan data stok ajax
//     Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete stok ajax
//     Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']); // menghapus data stok ajax
//     Route::delete('/{id}', [StokController::class, 'destroy']); // menghapus data stok
// });

// Route::group(['prefix' => 'penjualan'], function () {
//     Route::get('/', [PenjualanController::class, 'index']); // menampilkan halaman awal penjualan
//     Route::post('/list', [PenjualanController::class, 'list']); // menampilkan data penjualan dalam bentuk json untuk datatables
//     Route::get('/create', [PenjualanController::class, 'create']); // menampilkan halaman form tambah penjualan
//     Route::post('/', [PenjualanController::class, 'store']); // menyimpan data penjualan baru
//     Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']); // menampilkan halaman form tambah penjualan ajax
//     Route::post('/ajax', [PenjualanController::class, 'store_ajax']); // menyimpan data penjualan baru ajax
//     Route::get('/{id}', [PenjualanController::class, 'show']); // menampilkan detail penjualan
//     Route::get('/{id}/edit', [PenjualanController::class, 'edit']); // menampilkan halaman form edit penjualan
//     Route::put('/{id}', [PenjualanController::class, 'update']); // menyimpan perubahan data penjualan
//     Route::get('/{id}/show_ajax', [PenjualanController::class, 'show_ajax']); // menampilkan detail penjualan ajax
//     Route::get('/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']); // menampilkan halaman form edit penjualan ajax
//     Route::put('/{id}/update_ajax', [PenjualanController::class, 'update_ajax']); // menyimpan perubahan data penjualan ajax
//     Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete penjualan ajax
//     Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']); // menghapus data penjualan ajax
//     Route::delete('/{id}', [PenjualanController::class, 'destroy']); // menghapus data penjualan
// });

// Route::group(['prefix' => 'penjualan_detail'], function () {
//     Route::get('/', [DetailPenjualanController::class, 'index']); // halaman index
//     Route::post('/list', [DetailPenjualanController::class, 'list']); // datatable ajax
//     Route::get('/create', [DetailPenjualanController::class, 'create']); // form create
//     Route::post('/', [DetailPenjualanController::class, 'store']); // simpan data
//     Route::get('/create_ajax', [DetailPenjualanController::class, 'create_ajax']); // form create ajax (modal)
//     Route::post('/ajax', [DetailPenjualanController::class, 'store_ajax']); // simpan data via ajax
//     Route::get('/{id}', [DetailPenjualanController::class, 'show']); // detail
//     Route::get('/{id}/edit', [DetailPenjualanController::class, 'edit']); // form edit
//     Route::put('/{id}', [DetailPenjualanController::class, 'update']); // update data
//     Route::get('/{id}/show_ajax', [DetailPenjualanController::class, 'show_ajax']); // detail ajax
//     Route::get('/{id}/edit_ajax', [DetailPenjualanController::class, 'edit_ajax']); // form edit ajax (modal)
//     Route::put('/{id}/update_ajax', [DetailPenjualanController::class, 'update_ajax']); // update ajax
//     Route::get('/{id}/delete_ajax', [DetailPenjualanController::class, 'confirm_ajax']); // konfirmasi hapus ajax
//     Route::delete('/{id}/delete_ajax', [DetailPenjualanController::class, 'delete_ajax']); // hapus data ajax
//     Route::delete('/{id}', [DetailPenjualanController::class, 'destroy']); // hapus data
// });

// jobsheet 7
Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter (id), maka harus berupa angka
 
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister']);

Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu

    Route::get('/', [WelcomeController::class, 'index']);

    // route Level
    Route::group(['prefix' => 'level', 'middleware' => ['authorize:ADM']], function () {
        Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal level
        Route::post('/list', [LevelController::class, 'list']); // menampilkan data level dalam bentuk json untuk datatables
        Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah level
        Route::get('/create_ajax', [LevelController::class,'create_ajax']); // menampilkan halaman form tambah level ajax
        Route::post('/ajax', [LevelController::class,'store_ajax']); // menyimpan data level ajax
        Route::get('/{id}/show_ajax', [LevelController::class,'show_ajax']); // menampilkan detail level ajax
        Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // menampilkan halaman form edit level ajax
        Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // menyimpan perubahan data level ajax
        Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete level ajax
        Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // menghapus data level ajax
        Route::get('/import', [LevelController::class, 'import']); // menampilkan halaman form upload excel level ajax
        Route::post('/import_ajax', [LevelController::class, 'import_ajax']); // menyimpan import excel level ajax
        Route::get('/export_excel', [LevelController::class, 'export_excel']); // menampilkan halaman form export excel level ajax
        Route::get('/export_pdf', [LevelController::class, 'export_pdf']); // menampilkan halaman form export pdf level
    });
    
    // route User
    Route::group(['prefix' => 'user', 'middleware' => ['authorize:ADM,MNG']], function () {
        Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
        Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah user ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru ajax
        Route::get('/{id}/show_ajax', [UserController::class,'show_ajax']); // menampilkan detail user ajax
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // menampilkan halaman form edit user ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // menyimpan perubahan data user ajax
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete user ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // menghapus data user ajax
        Route::get('/import', [UserController::class, 'import']); // menampilkan halaman form upload excel user ajax
        Route::post('/import_ajax', [UserController::class, 'import_ajax']); // menyimpan import excel user ajax
        Route::get('/export_excel', [UserController::class, 'export_excel']); // menampilkan halaman form export excel user ajax
        Route::get('/export_pdf', [UserController::class, 'export_pdf']); // menampilkan halaman form export pdf user
    });

    // route Kategori
    Route::group(['prefix' => 'kategori', 'middleware' => ['authorize:ADM,MNG,STF']], function () {
        Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal kategori
        Route::post('/list', [KategoriController::class, 'list']); // menampilkan data kategori dalam bentuk json untuk datatables
        Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah kategori
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah kategori ajax
        Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data kategori baru ajax
        Route::get('/{id}/show_ajax', [KategoriController::class,'show_ajax']); // menampilkan detail kategori ajax
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // menampilkan halaman form edit kategori ajax
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // menyimpan perubahan data kategori ajax
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete kategori ajax
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // menghapus data kategori ajax
        Route::get('/import', [KategoriController::class, 'import']); // menampilkan halaman form upload excel kategori ajax
        Route::post('/import_ajax', [KategoriController::class, 'import_ajax']); // menyimpan import excel kategori ajax
        Route::get('/export_excel', [KategoriController::class, 'export_excel']); // menampilkan halaman form export excel kategori ajax
        Route::get('/export_pdf', [KategoriController::class, 'export_pdf']); // menampilkan halaman form export pdf kategori
    });

    // route Barang
    Route::group(['prefix' => 'barang', 'middleware' => ['authorize:ADM,MNG,CUS,STF']], function () {
        Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal barang
        Route::post('/list', [BarangController::class, 'list']); // menampilkan data barang dalam bentuk json untuk datatables
        Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah barang
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // menampilkan halaman form tambah barang ajax
        Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data barang baru ajax
        Route::get('/{id}/show_ajax', [BarangController::class,'show_ajax']); // menampilkan detail barang ajax
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // menampilkan halaman form edit barang ajax
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // menyimpan perubahan data barang ajax
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete barang ajax
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // menghapus data barang ajax
        Route::get('/import', [BarangController::class, 'import']); // menampilkan halaman form upload excel barang ajax
        Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // menyimpan import excel barang ajax
        Route::get('/export_excel', [BarangController::class, 'export_excel']); // menampilkan halaman form export excel barang ajax
        Route::get('/export_pdf', [BarangController::class, 'export_pdf']); // menampilkan halaman form export pdf barang
    });
    
    // route Supplier
    Route::group(['prefix' => 'supplier', 'middleware' => ['authorize:ADM,MNG,STF']], function () {
        Route::get('/', [SupplierController::class, 'index']); // menampilkan halaman awal supplier
        Route::post('/list', [SupplierController::class, 'list']); // menampilkan data supplier dalam bentuk json untuk datatables
        Route::get('/create', [SupplierController::class, 'create']); // menampilkan halaman form tambah supplier
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah supplier ajax
        Route::post('/ajax', [SupplierController::class, 'store_ajax']); // menyimpan data supplier baru ajax
        Route::get('/{id}/show_ajax', [SupplierController::class,'show_ajax']); // menampilkan detail supplier ajax
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // menampilkan halaman form edit supplier ajax
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // menyimpan perubahan data supplier ajax
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete supplier ajax
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // menghapus data supplier ajax
        Route::get('/import', [SupplierController::class, 'import']); // menampilkan halaman form upload excel supplier ajax
        Route::post('/import_ajax', [SupplierController::class, 'import_ajax']); // menyimpan import excel supplier ajax
        Route::get('/export_excel', [SupplierController::class, 'export_excel']); // menampilkan halaman form export excel supplier ajax
        Route::get('/export_pdf', [SupplierController::class, 'export_pdf']); // menampilkan halaman form export pdf supplier
    });

    // route Stok
    Route::group(['prefix' => 'stok', 'middleware' => ['authorize:ADM,MNG,STF']], function () {
        Route::get('/', [StokController::class, 'index']); // menampilkan halaman awal stok
        Route::post('/list', [StokController::class, 'list']); // menampilkan data stok dalam bentuk json untuk datatables
        Route::get('/create', [StokController::class, 'create']); // menampilkan halaman form tambah stok
        Route::get('/create_ajax', [StokController::class, 'create_ajax']); // menampilkan halaman form tambah stok ajax
        Route::post('/ajax', [StokController::class, 'store_ajax']); // menyimpan data stok baru ajax
        Route::get('/{id}/show_ajax', [StokController::class,'show_ajax']); // menampilkan detail stok ajax
        Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']); // menampilkan halaman form edit stok ajax
        Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']); // menyimpan perubahan data stok ajax
        Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete stok ajax
        Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']); // menghapus data stok ajax
        Route::get('/import', [StokController::class, 'import']); // menampilkan halaman form upload excel stok ajax
        Route::post('/import_ajax', [StokController::class, 'import_ajax']); // menyimpan import excel stok ajax
        Route::get('/export_excel', [StokController::class, 'export_excel']); // menampilkan halaman form export excel stok ajax
        Route::get('/export_pdf', [StokController::class, 'export_pdf']); // menampilkan halaman form export pdf stok
    });

    // route Penjualan
    Route::group(['prefix' => 'penjualan', 'middleware' => ['authorize:ADM,MNG,STF']], function () {
        Route::get('/', [PenjualanController::class, 'index']); // menampilkan halaman awal penjualan
        Route::post('/list', [PenjualanController::class, 'list']); // menampilkan data penjualan dalam bentuk json untuk datatables
        Route::get('/create', [PenjualanController::class, 'create']); // menampilkan halaman form tambah penjualan
        Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']); // menampilkan halaman form tambah penjualan ajax
        Route::post('/ajax', [PenjualanController::class, 'store_ajax']); // menyimpan data penjualan baru ajax
        Route::get('/{id}/show_ajax', [PenjualanController::class,'show_ajax']); // menampilkan detail penjualan ajax
        Route::get('/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']); // menampilkan halaman form edit penjualan ajax
        Route::put('/{id}/update_ajax', [PenjualanController::class, 'update_ajax']); // menyimpan perubahan data penjualan ajax
        Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete penjualan ajax
        Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']); // menghapus data penjualan ajax
        Route::get('/import', [PenjualanController::class, 'import']); // menampilkan halaman form upload excel penjualan ajax
        Route::post('/import_ajax', [PenjualanController::class, 'import_ajax']); // menyimpan import excel penjualan ajax
        Route::get('/export_excel', [PenjualanController::class, 'export_excel']); // menampilkan halaman form export excel penjualan ajax
        Route::get('/export_pdf', [PenjualanController::class, 'export_pdf']); // menampilkan halaman form export pdf penjualan
    });

    // route Detail Penjualan
    // Route::group(['prefix' => 'penjualan_detail', 'middleware' => ['authorize:ADM,MNG,STF']], function () {
    //     Route::get('/', [DetailPenjualanController::class, 'index']); // menampilkan halaman awal detail penjualan
    //     Route::post('/list', [DetailPenjualanController::class, 'list']); // menampilkan data detail penjualan dalam bentuk json untuk datatables
    //     Route::get('/create', [DetailPenjualanController::class, 'create']); // menampilkan halaman form tambah detail penjualan
    //     Route::get('/create_ajax', [DetailPenjualanController::class, 'create_ajax']); // menampilkan halaman form tambah detail penjualan ajax
    //     Route::post('/ajax', [DetailPenjualanController::class, 'store_ajax']); // menyimpan data detail penjualan baru ajax
    //     Route::get('/{id}/show_ajax', [DetailPenjualanController::class,'show_ajax']); // menampilkan detail detail penjualan ajax
    //     Route::get('/{id}/edit_ajax', [DetailPenjualanController::class, 'edit_ajax']); // menampilkan halaman form edit detail penjualan ajax
    //     Route::put('/{id}/update_ajax', [DetailPenjualanController::class, 'update_ajax']); // menyimpan perubahan data detail penjualan ajax
    //     Route::get('/{id}/delete_ajax', [DetailPenjualanController::class, 'confirm_ajax']); // menampilkan form konfirmasi delete detail penjualan ajax
    //     Route::delete('/{id}/delete_ajax', [DetailPenjualanController::class, 'delete_ajax']); // menghapus data detail penjualan ajax
    //     Route::get('/import', [DetailPenjualanController::class, 'import']); // menampilkan halaman form upload excel detail penjualan ajax
    //     Route::post('/import_ajax', [DetailPenjualanController::class, 'import_ajax']); // menyimpan import excel detail penjualan ajax
    //     Route::get('/export_excel', [DetailPenjualanController::class, 'export_excel']); // menampilkan halaman form export excel detail penjualan ajax
    //     Route::get('/export_pdf', [DetailPenjualanController::class, 'export_pdf']); // menampilkan halaman form export pdf detail penjualan
    // });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::post('/update_photo', [ProfileController::class, 'update_photo']);
    });

});