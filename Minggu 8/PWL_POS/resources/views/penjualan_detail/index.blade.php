@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penjualan_detail/create') }}">Tambah</a>
                <button onclick="modalAction('{{ url('/penjualan_detail/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" name="penjualan_id" id="penjualan_id" required>
                                <option value="">- Semua -</option>
                                @foreach($penjualan as $item)
                                <option value="{{ $item->penjualan_id }}">{{ $item->penjualan_kode }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kode Penjualan</small>
                        </div>
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" name="barang_id" id="barang_id" required>
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
                        <th>ID Detail Penjualan</th>
                        <th>Kode Penjualan</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

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
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "penjualan_kode",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "harga",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jumlah",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "",
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