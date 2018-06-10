<table class="table table-striped" id="tablehitung">
	<thead>
	  <tr>
	    <th>Kode Produk</th>
	    <th>Nama Produk</th>
	    <th>Jumlah Beli</th>
	    <th>Total</th>
	    <th>Aksi</th>
	  </tr>
	</thead>
	<tbody>
		@foreach($transaksicombine as $transaksi)
			<tr>
				<td>{{ $transaksi->kd_barang }}</td>
				<td>{{ $transaksi->nama_roti }}</td>
				<td>{{ $transaksi->jumlah }}</td>
				<td>{{ $transaksi->total_harga }}</td>
				<td>
					<a href="javascript:void(0);" id="hapushitungan"
						 rel="{{ $transaksi->transaction_detail_id }}"
						 title="Hapus"><i class="fas fa-times"></i></a>
				</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>
	  <tr>
	    <th colspan="3">Total</th>
	    <td>{{ $total }}</td>
	  </tr>
	</tfoot>
	
</table>
