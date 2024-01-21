@extends('layouts.master')
@section('tittle','user')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @can('admin')
                <div class="card-body">
                    <h4 class="card-title">History Table 
                       
                    </h4>
                    <br>
                </p>
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Total Harga</th>
                            <th>Jumlah Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>status</th>
                            <th>Pemesan</th>
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
                                <td>{{$trans->Detail_transaksi->Customer->nama}}</td>
                                <td>{{$trans->Detail_transaksi->id}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endcan
                @can('customer')
                    <div class="card-header">
                        <h4>Terbayar</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode Pesanan</th>
                                        <th>produk pesanan</th>
                                        <th>jumlah barang</th>
                                        <th>total harga</th>
                                        <th>status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terpesan as $t)
                                    <tr>
                                        <td>{{$t->id}}</td>
                                        <td>{{$t->Produk->nama}}</td>
                                        <td>{{$t->jumlah_barang}}</td>
                                        <td>{{number_format($t->total_harga,2,',','.')}}</td>
                                        <td>{{$t->status}}</td>
                                        <td><a target="_blank" href="/transaksi/{{$t->id}}/struk" class="btn btn-success">Struk <i class="icon-printer"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        @endcan
            </div>
        </div>
    </div>
</div>
@endsection