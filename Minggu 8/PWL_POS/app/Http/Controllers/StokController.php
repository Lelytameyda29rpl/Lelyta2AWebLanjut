<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok Barang',
            'list' => ['Home', 'Stok']
        ];

        $page = (object) [
            'title' => 'Daftar stok barang yang terdaftar di sistem'
        ];

        $activeMenu = 'stok';
        $barang = BarangModel::all();
        $user = UserModel::all();

        return view('stok.index', compact('breadcrumb', 'page', 'activeMenu', 'barang', 'user'));
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok Barang',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah stok barang baru'
        ];

        $activeMenu = 'stok';
        $barang = BarangModel::all();
        $user = UserModel::all();

        return view('stok.create', compact('breadcrumb', 'page', 'activeMenu', 'barang', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id'     => 'required|exists:m_barang,barang_id',
            'user_id'       => 'required|exists:m_user,user_id',
            'stok_tanggal'  => 'required|date',
            'stok_jumlah'   => 'required|numeric|min:1',
        ]);

        StokModel::create($request->all());

        return redirect('/stok')->with('success', 'Data stok berhasil ditambahkan');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Stok Barang',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail stok barang'
        ];

        $activeMenu = 'stok';
        $stok = StokModel::with('barang', 'user')->findOrFail($id);

        return view('stok.show', compact('breadcrumb', 'page', 'activeMenu', 'stok'));
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Stok Barang',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit stok barang'
        ];

        $activeMenu = 'stok';
        $stok = StokModel::findOrFail($id);
        $barang = BarangModel::all();
        $user = UserModel::all();

        return view('stok.edit', compact('breadcrumb', 'page', 'activeMenu', 'stok', 'barang', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id'     => 'required|exists:m_barang,barang_id',
            'user_id'       => 'required|exists:m_user,user_id',
            'stok_tanggal'  => 'required|date',
            'stok_jumlah'   => 'required|numeric|min:1',
        ]);

        $stok = StokModel::findOrFail($id);
        $stok->update($request->all());

        return redirect('/stok')->with('success', 'Data stok berhasil diperbarui');
    }

    public function destroy($id)
    {
        $stok = StokModel::find($id);

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            $stok->delete();
            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena terkait dengan data lain');
        }
    }

    public function list(Request $request)
    {
        $stok = StokModel::with('barang', 'user');

        if ($request->barang_id) {
            $stok->where('barang_id', $request->barang_id);
        }

        if ($request->user_id) {
            $stok->where('user_id', $request->user_id);
        }

        return DataTables::of($stok)
            ->addIndexColumn()
            ->addColumn('barang_nama', fn($stok) => $stok->barang->barang_nama ?? '-')
            ->addColumn('nama', fn($stok) => $stok->user->nama ?? '-')
            ->addColumn('aksi', function ($stok) {
                return '
                    <button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button>
                    <button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button>
                    <button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $user = UserModel::select('user_id', 'nama')->get();

        return view('stok.create_ajax', compact('barang', 'user'));
    }

    public function store_ajax(Request $request)
    {
        if (!$request->ajax()) {
            return abort(403, 'Akses tidak diizinkan');
        }

        $validator = Validator::make($request->all(), [
            'barang_id'     => 'required|exists:m_barang,barang_id',
            'user_id'       => 'required|exists:m_user,user_id',
            'stok_tanggal'  => 'required|date',
            'stok_jumlah'   => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validasi gagal',
                'msgField'  => $validator->errors()
            ]);
        }

        StokModel::create($request->all());

        return response()->json([
            'status'  => true,
            'message' => 'Data stok berhasil ditambahkan'
        ]);
    }

    public function edit_ajax($id)
    {
        $stok = StokModel::findOrFail($id);
        $barang = BarangModel::all();

        return view('stok.edit_ajax', compact('stok', 'barang'));
    }

    public function update_ajax(Request $request, $id)
    {
        if (!$request->ajax()) {
            return response()->json([
                'status'  => false,
                'message' => 'Akses tidak diizinkan (bukan AJAX)'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'barang_id'     => 'required|exists:m_barang,barang_id',
            'stok_tanggal'  => 'required|date',
            'stok_jumlah'   => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validasi gagal',
                'msgField'  => $validator->errors()
            ]);
        }

        try {
            $stok = StokModel::findOrFail($id);
            $stok->update([
                'barang_id'     => $request->barang_id,
                'stok_tanggal'  => $request->stok_tanggal,
                'stok_jumlah'   => $request->stok_jumlah,
                //'user_id'       => Auth::id(),
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Data stok berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Terjadi kesalahan saat mengupdate data'
            ]);
        }
    }

    public function confirm_ajax(string $id)
    {
        $stok = StokModel::find($id);

        return view('stok.confirm_ajax')->with('stok', $stok);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $check = StokModel::find($id);
            try {
               $check = StokModel::find($id);
               if ($check) {
                   $check->delete();
                   return response()->json([
                       'status' => true,
                       'message' => 'Data berhasil dihapus'
                   ]);
               } else {
                   return response()->json([
                       'status' => false,
                       'message' => 'Data tidak ditemukan'
                   ]);
               }
           } catch (\Exception $e) {
               Log::error('Error deleting user: ' . $e->getMessage());
               if (str_contains($e->getMessage(), 'SQLSTATE[23000]')) {
                   return response()->json([
                       'status' => false,
                       'message' => 'Data tidak dapat dihapus karena masih terkait dengan data lain di sistem'
                   ]);
               }
           }
       }
       return redirect('/');
    }

    public function show_ajax($id)
    {
        $stok = StokModel::with('barang', 'user')->findOrFail($id);
        return view('stok.show_ajax', compact('stok'));
    }

    // tugas jobsheet 8
    public function import()
    {
        return view('stok.import');
    }

    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_stok' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_stok'); // ambil file dari request
            $reader = IOFactory::createReader('Xlsx'); // load reader file excel
            $reader->setReadDataOnly(true); // hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath()); // load file excel
            $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif
            $data = $sheet->toArray(null, false, true, true); // ambil data excel
            $insert = [];
            if (count($data) > 1) { // jika data lebih dari 1 baris
                foreach ($data as $baris => $value) {
                    if ($baris > 1) { // baris ke 1 adalah header, maka lewati
                        $insert[] = [
                            'barang_id' => $value['A'],
                            'user_id' => $value['B'],
                            'stok_tanggal' => Date::excelToDateTimeObject($value['C'])->format('Y-m-d H:i:s'),
                            'stok_jumlah' => $value['D'],
                            'created_at' => now(),
                        ];
                    }
                }
                if (count($insert) > 0) {
                    // insert data ke database, jika data sudah ada, maka diabaikan
                    StokModel::insertOrIgnore($insert);
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }
}
