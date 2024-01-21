<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Laporan</title>
</head>
<body onload="window.print()">
    <center>
    <table border="1" id="dataTable" class="table table-hover">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Total Harga</th>
                <th>Jumlah Bayar</th>
                <th>Tanggal Bayar</th>
                <th>status</th>
                <th>Keterangan</th>
                <th>Petugas</th>
               
                <th>Kode Pesanan</th>
               
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1
            @endphp
            @foreach ($transaksi as $trans)
            <tr>
                <td>{{$trans->id}}</td>
                <td>{{number_format($trans->Detail_transaksi->total_harga,2,',','.')}}</td>
                <td>{{number_format($trans->total_bayar,2,',','.')}}</td>
                <td>{{$trans->tanggal}}</td>
                <td>{{$trans->status}}</td>
                <td>{{$trans->keterangan}}</td>
                <td>{{$trans->User->nama}}</td>
                <td>{{$trans->id_pesanan}}</td>
               
            </tr>
            @endforeach
        </tbody>
</center>
<div class="kotak" style="margin-left:800px">
    <p>Bandung.......................!</p>
    <br>
    <br>
    <p>Penjualan Produk Pkk</p>
</div>
</body>
</html>