@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Stok</h3>
        <div class="card-tools">
             <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-info">Import Stok</button>
             <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-fileexcel"></i>Export Stok (Excel)</a>
             <button onclick="modalAction('{{ url('stok/create_ajax') }}')" class="btn btn-success">Tambah Data Ajax</button>
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
                        <select class="form-control" name="barang_id" id="barang_id">
                            <option value="">- Semua Barang -</option>
                            @foreach($barang as $item)
                                <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Nama Barang</small>
                    </div>
                    <div class="col-3">
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="">- Semua User -</option>
                            @foreach($user as $item)
                                <option value="{{ $item->user_id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">User Input</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">ID Stok</th>
                    <th style="text-align: center;">Nama Barang</th>
                    <th style="text-align: center;">Nama User</th>
                    <th style="text-align: center;">Tanggal Stok</th>
                    <th style="text-align: center;">Jumlah Stok</th>
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

    var dataStok;
        $(document).ready(function() {
           dataStok = $('#table_stok').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('stok/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d) {
                        d.barang_id = $('#barang_id').val();
                        d.user_id = $('#user_id').val();
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
                     data: "stok_id",
                     className: "text-center",
                     width: "7%",
                     orderable: true,
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
                    data: "nama",
                    className: "",
                    width: "10%",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "stok_tanggal",
                    className: "",
                    width: "10%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "stok_jumlah",
                    className: "text-center",
                    width: "10%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    className: "text-center",
                    width: "10%",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#barang_id, #user_id').change(function () {
            dataStok.ajax.reload();
        });
    });
</script>
@endpush