@extends('layouts.master')
@section('tittle','pesanan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Transaksi :{{$detail->id_transaksi}}
                </h4>
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>produk pesanan</th>
                                <th>jumlah barang</th>
                                <th>total harga</th>
                                <th>Pembeli</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$detail->id}}</td>
                                <td>{{$detail->Produk->nama}}</td>
                                <td>{{$detail->jumlah_barang}}</td>
                                <td>{{number_format($detail->total_harga,2,',','.')}}</td>
                                <td>{{$detail->Customer->nama}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <th>Jumlah Keseluruhan</th>
                            <th>:</th>
                            <th colspan="3" align="left">{{$totalHarga}}</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection