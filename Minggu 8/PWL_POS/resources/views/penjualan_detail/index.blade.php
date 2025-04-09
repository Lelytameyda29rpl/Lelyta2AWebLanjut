@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Detail Penjualan</h3>
            <div class="card-tools">
             <button onclick="modalAction('{{ url('/penjualan_detail/import') }}')" class="btn btn-info">Import Detail Penjualan</button>
             <a class="btn btn-primary" href="{{ url('penjualan_detail/create') }}">Tambah Data</a>
             <button onclick="modalAction('{{ url('penjualan_detail/create_ajax') }}')" class="btn btn-success">Tambah Data Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Filter:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="penjualan_id" id="penjualan_id">
                                <option value="">- Semua -</option>
                                @foreach($penjualan as $item)
                                <option value="{{ $item->penjualan_id }}">{{ $item->penjualan_kode }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kode Penjualan</small>
                        </div>
                        <label class="col-sm-3 col-form-label">Filter:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="barang_id" id="barang_id">
                                <option value="">- Semua -</option>
                                @foreach($barang as $item)
                                <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Nama Barang</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan_detail">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th> 
                        <th style="text-align: center;">ID Detail Penjualan</th>
                        <th style="text-align: center;">Kode Penjualan</th>
                        <th style="text-align: center;">Nama Barang</th>
                        <th style="text-align: center;">Harga</th>
                        <th style="text-align: center;">Jumlah</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('js')
    <script>
       function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }

        var dataPenjualan_Detail;
        $(document).ready(function() {
           dataPenjualan_Detail = $('#table_penjualan_detail').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('penjualan_detail/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d) {
                        d.penjualan_id = $('#penjualan_id').val();
                        d.barang_id = $('#barang_id').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        width: "4%",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "detail_id",
                        className: "text-center",
                        width: "7%",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "penjualan_kode",
                        className: "",
                        width: "10%",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_nama",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "harga",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jumlah",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        width: "20%",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('#penjualan_id, #barang_id').change(function() {
                dataPenjualan_Detail.ajax.reload();
            });
        });
    </script>
@endpush