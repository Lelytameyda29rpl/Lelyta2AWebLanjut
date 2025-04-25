<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LevelModel;
use App\Models\KategoriModel;
use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\SupplierModel;
use App\Models\PenjualanDetailModel;

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
        ];

        $activeMenu = 'dashboard';

        // Ambil jumlah data
        $totalUser = UserModel::count();
        $totalLevel = LevelModel::count();
        $totalKategori = KategoriModel::count();
        $totalBarang = BarangModel::count();
        $totalStok = StokModel::count();
        $totalSupplier = SupplierModel::count();
        $totalPenjualanDetail = PenjualanDetailModel::count();

        return view('welcome', compact(
            'breadcrumb',
            'activeMenu',
            'totalUser',
            'totalLevel',
            'totalKategori',
            'totalBarang',
            'totalStok',
            'totalSupplier',
            'totalPenjualanDetail'
        ));
    }
}
