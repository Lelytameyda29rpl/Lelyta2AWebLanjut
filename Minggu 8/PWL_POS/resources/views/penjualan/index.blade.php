@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Penjualan</h3>
            <div class="card-tools">
                 <button onclick="modalAction('{{ url('/penjualan/import') }}')" class="btn btn-info">Import Penjualan</button>
                 <a href="{{ url('/penjualan/export_excel') }}" class="btn btn-primary"><i class="fa fa-fileexcel"></i>Export Penjualan (Excel)</a>
                 <a href="{{ url('/penjualan/export_pdf') }}" class="btn btn-warning"><i class="fa fa-filepdf"></i> Export Penjualan (PDF)</a>
                 <button onclick="modalAction('{{ url('penjualan/create_ajax') }}')" class="btn btn-success">Tambah Data Ajax</button>
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
                            <select class="form-control" name="user_id" id="user_id">
                                <option value="">- Semua -</option>
                                @foreach($user as $item)
                                <option value="{{ $item->user_id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Nama User</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">ID Penjualan</th>
                        <th style="text-align: center;">Nama User</th>
                        <th style="text-align: center;">Pembeli</th>
                        <th style="text-align: center;">Kode Penjualan</th>
                        <th style="text-align: center;">Tanggal Penjualan</th>
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

        var dataPenjualan;
        $(document).ready(function() {
           dataPenjualan = $('#table_penjualan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('penjualan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d) {
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
                        data: "penjualan_id",
                        className: "text-center",
                        width: "7%",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "user.nama",
                        className: "",
                        width: "10%",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "pembeli",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "penjualan_kode",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "penjualan_tanggal",
                        className: "",
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
            $('#user_id').change(function() {
                dataPenjualan.ajax.reload();
            });
        });
    </script>
@endpush