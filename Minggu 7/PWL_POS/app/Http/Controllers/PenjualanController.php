<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\PenjualanModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list' => ['Home', 'Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar Penjualan yang terdaftar di sistem'
        ];

        $activeMenu = 'penjualan';

        $user = UserModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'user' => $user]);
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
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Penjualan baru'
        ];

        $activeMenu = 'penjualan';

        $user = UserModel::all();

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required|unique:t_penjualan',
            'penjualan_tanggal' => 'required',
        ]);

        PenjualanModel::create($request->all());

        return redirect('/penjualan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Penjualan yang terdaftar di sistem'
        ];

        $activeMenu = 'penjualan';

        $penjualan = PenjualanModel::with('user')->find($id);

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan' => $penjualan]);
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Penjualan',
            'list' => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Penjualan yang terdaftar di sistem'
        ];

        $activeMenu = 'penjualan';

        $penjualan = PenjualanModel::find($id);
        $user = UserModel::all();

        return view('penjualan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan' => $penjualan, 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required|unique:t_penjualan,penjualan_kode,' . $id . ',penjualan_id',
            'penjualan_tanggal' => 'required|date',
        ]);

        PenjualanModel::find($id)->update($request->all());

        return redirect('/penjualan')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $check = PenjualanModel::find($id);
        if (!$check) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try {
            PenjualanModel::destroy($id);

            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/penjualan')->with('error', 'Data penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // tugas jobsheet 6
    public function list(Request $request)
    {
        $penjualan = PenjualanModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')->with('user');

        if ($request->user_id) {
            $penjualan->where('user_id', $request->user_id);
        }

        return DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {
                $btn = '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        $user = UserModel::select('user_id', 'nama')->get();

        return view('penjualan.create_ajax')->with('user', $user);
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'user_id' => 'required|exists:m_user,user_id',
                'pembeli' => 'required|min:3',
                'penjualan_kode' => 'required|min:3|unique:t_penjualan,penjualan_kode',
                'penjualan_tanggal' => 'required|date',
                
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            PenjualanModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data penjualan berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $penjualan = PenjualanModel::find($id);
        $user = UserModel::select('user_id', 'nama')->get();

        return view('penjualan.edit_ajax')->with('penjualan', $penjualan)->with('user', $user);
    }

    public function update_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'user_id' => 'required|exists:m_user,user_id',
                'pembeli' => 'required|min:3',
                'penjualan_kode' => 'required|min:3|unique:t_penjualan,penjualan_kode,' . $id . ',penjualan_id',
                'penjualan_tanggal' => 'required|date',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            $check = PenjualanModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $penjualan = PenjualanModel::find($id);

        return view('penjualan.confirm_ajax')->with('penjualan', $penjualan);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $check = PenjualanModel::find($id);
            try {
               $check = PenjualanModel::find($id);
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
               Log::error('Error deleting penjualan: ' . $e->getMessage());
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
        $penjualan = PenjualanModel::with('user')->find($id);
        return view('penjualan.show_ajax', ['penjualan' => $penjualan]);
    }
}
  