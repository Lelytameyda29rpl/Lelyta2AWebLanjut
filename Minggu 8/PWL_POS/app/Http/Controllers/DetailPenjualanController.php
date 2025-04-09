<?php
namespace App\Http\Controllers;

use App\Models\DetailPenjualanModel;
use App\Models\PenjualanModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar Detail Penjualan yang terdaftar di sistem'
        ];

        $activeMenu = 'penjualan_detail';

        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();

        return view('penjualan_detail.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan' => $penjualan, 'barang' => $barang]);
    }

    // public function list(Request $request)
    // {
    //     $barang = BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'kategori_id')->with('kategori');

    //     if ($request->kategori_id) {
    //         $barang->where('kategori_id', $request->kategori_id);
    //     }

    //     return DataTables::of($barang)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($barang) {
    //             $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Detail</a> ';
    //             $btn .= '<a href="' . url('/barang/' . $barang->barang_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
    //             $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->barang_id) . '">'
    //                 . csrf_field() . method_field('DELETE') .
    //                 '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
    //             return $btn;
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Detail Penjualan baru'
        ];

        $activeMenu = 'penjualan_detail';

        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();

        return view('penjualan_detail.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan' => $penjualan, 'barang' => $barang]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required',
            'barang_id' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        DetailPenjualanModel::create($request->all());

        return redirect('/penjualan_detail')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Penjualan yang terdaftar di sistem'
        ];

        $activeMenu = 'penjualan_detail';

        $penjualan_detail = DetailPenjualanModel::with('penjualan', 'barang')->find($id);

        return view('penjualan_detail.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan_detail' => $penjualan_detail]);
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Detail Penjualan yang terdaftar di sistem'
        ];

        $activeMenu = 'penjualan_detail';

        $penjualan_detail = DetailPenjualanModel::find($id);
        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();

        return view('penjualan_detail.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan_detail' => $penjualan_detail, 'penjualan' => $penjualan, 'barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penjualan_id' => 'required',
            'barang_id' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        DetailPenjualanModel::find($id)->update($request->all());

        return redirect('/penjualan_detail')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $check = DetailPenjualanModel::find($id);
        if (!$check) {
            return redirect('/penjualan_detail')->with('error', 'Data detail penjualan tidak ditemukan');
        }

        try {
            DetailPenjualanModel::destroy($id);

            return redirect('/penjualan_detail')->with('success', 'Data detail penjualan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/penjualan_detail')->with('error', 'Data detail penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // tugas jobsheet 6
    public function list(Request $request)
{
    try {
        $query = DetailPenjualanModel::with(['penjualan', 'barang']);

        // Filter jika ada request penjualan_id
        if ($request->filled('penjualan_id')) {
            $query->where('penjualan_id', $request->penjualan_id);
        }

        // Filter jika ada request barang_id
        if ($request->filled('barang_id')) {
            $query->where('barang_id', $request->barang_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('penjualan_kode', function ($row) {
                return optional($row->penjualan)->penjualan_kode ?? '-';
            })
            ->addColumn('barang_nama', function ($row) {
                return optional($row->barang)->barang_nama ?? '-';
            })
            ->addColumn('aksi', function ($row) {
                $btn  = '<button onclick="modalAction(\'' . url('/penjualan_detail/' . $row->detail_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan_detail/' . $row->detail_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan_detail/' . $row->detail_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
        ]);
    }
}

    public function create_ajax()
    {
        $penjualan = PenjualanModel::select('penjualan_id', 'penjualan_kode')->get();
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();

        return view('penjualan_detail.create_ajax')->with([
            'penjualan' => $penjualan,
            'barang' => $barang
        ]);
        
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'penjualan_id' => 'required|exists:t_penjualan,penjualan_id',
                'barang_id' => 'required|exists:m_barang,barang_id',
                'harga' => 'required|numeric',
                'jumlah' => 'required|integer',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            DetailPenjualanModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data detail penjualan berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $penjualan_detail = DetailPenjualanModel::find($id);
        $penjualan = PenjualanModel::select('penjualan_id', 'penjualan_kode')->get();
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();

        return view('penjualan_detail.edit_ajax')->with('penjualan_detail', $penjualan_detail)->with([
            'penjualan' => $penjualan,
            'barang' => $barang
        ]);
    }

    public function update_ajax(Request $request, string $id)
{
    if ($request->ajax() || $request->wantsJson()) {
        $rules = [
            'penjualan_id' => 'required|exists:t_penjualan,penjualan_id',
            'barang_id' => 'required|exists:m_barang,barang_id',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal',
                'msgField' => $validator->errors(),
            ]);
        }

        $check = DetailPenjualanModel::find($id);
        if (!$check) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }

        try {
            // Update hanya field yang diizinkan
            $check->update([
                'penjualan_id' => $request->penjualan_id,
                'barang_id' => $request->barang_id,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            // Log untuk debugging jika error 500
            \Log::error('Gagal update detail penjualan: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengupdate data.',
                'error' => $e->getMessage() // bisa dihapus di production
            ], 500);
        }
    }

    return redirect('/');
}


    public function confirm_ajax(string $id)
    {
        $penjualan_detail = DetailPenjualanModel::find($id);

        return view('penjualan_detail.confirm_ajax')->with('penjualan_detail', $penjualan_detail);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $check = DetailPenjualanModel::find($id);
            try {
               $check = DetailPenjualanModel::find($id);
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
               Log::error('Error deleting detail penjualan: ' . $e->getMessage());
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

    public function show_ajax(string $id)
    {
        $penjualan_detail = DetailPenjualanModel::with('penjualan', 'barang')->find($id);
        return view('penjualan_detail.show_ajax', ['penjualan_detail' => $penjualan_detail]);
    }
}
  