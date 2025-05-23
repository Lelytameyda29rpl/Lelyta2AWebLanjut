@empty($penjualan_detail)
     <div id="modal-master" class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="alert alert-danger">
                     <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                     Data yang anda cari tidak ditemukan
                 </div>
                 <a href="{{ url('/penjualan_detail') }}" class="btn btn-warning">Kembali</a>
             </div>
         </div>
     </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="25%">ID Detail Penjualan</th>
                        <td>{{ $penjualan_detail->detail_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode Penjualan</th>
                        <td>{{ $penjualan_detail->penjualan->penjualan_kode }}</td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>{{ $penjualan_detail->barang->barang_nama }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>{{ $penjualan_detail->harga }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $penjualan_detail->jumlah }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
@endempty