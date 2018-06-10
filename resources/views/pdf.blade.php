<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <table width="20" class="table table-striped" id="tablehitung">
  <thead>
    <tr>
      <th>ID Transaksi</th>
      <th>Kode Barang</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    @foreach($transactionpdfs as $pdf)
      <tr>
        <td>{{ $pdf->id_transaksi }}</td>
        <td>{{ $pdf->kd_barang }}</td>
        <td>{{ $pdf->jumlah }}</td>
        <td>{{ "Rp. " . number_format($pdf->total_harga,2,',','.') }}</td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th colspan="3">Total</th>
      <td><h4>{{ $totalpdf }}</h4></td>
    </tr>
  </tfoot>
  
</table>
  
</body>
</html>

