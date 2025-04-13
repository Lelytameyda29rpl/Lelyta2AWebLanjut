@extends('layouts.template')

@section('content')

<div class="card shadow-lg border-0 rounded-3">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div>
                <h4 class="mb-0">Halo, {{ Auth::user()->nama }}👋</h4>
                <small>Senang melihatmu kembali!</small>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <p class="lead">Selamat datang kembali di <strong>Aplikasi POS</strong> kami! Semoga harimu menyenangkan dan bisnismu lancar 🚀</p>

        <hr>

        <div class="row mt-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white shadow-sm text-center">
            <div class="card-body">
                <i class="fas fa-user fa-2x mb-2"></i>
                <h6>User</h6>
                <h3>{{ $totalUser }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white shadow-sm text-center">
            <div class="card-body">
                <i class="fas fa-user-shield fa-2x mb-2"></i>
                <h6>Level</h6>
                <h3>{{ $totalLevel }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white shadow-sm text-center">
            <div class="card-body">
                <i class="fas fa-tags fa-2x mb-2"></i>
                <h6>Kategori</h6>
                <h3>{{ $totalKategori }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white shadow-sm text-center">
            <div class="card-body text-white">
                <i class="fas fa-box fa-2x mb-2 text-white"></i>
                <h6>Barang</h6>
                <h3>{{ $totalBarang }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card bg-secondary text-white shadow-sm text-center">
            <div class="card-body">
                <i class="fas fa-warehouse fa-2x mb-2"></i>
                <h6>Total Stok</h6>
                <h3>{{ $totalStok }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-danger text-white shadow-sm text-center">
            <div class="card-body">
                <i class="fas fa-truck fa-2x mb-2"></i>
                <h6>Supplier</h6>
                <h3>{{ $totalSupplier }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-dark text-white shadow-sm text-center">
            <div class="card-body">
                <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                <h6>Penjualan</h6>
                <h3>{{ $totalPenjualanDetail }}</h3>
            </div>
        </div>
    </div>
</div>


@endsection
