@extends('layouts.master')
@section('tittle','pesanan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Pesanan 
                    <a href="/pesanan/create" class="btn btn-primary">Tambah</a>
                </h4>
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>produk pesanan</th>
                                <th>jumlah barang</th>
                                <th>total harga</th>
                                <th>Kode Transaksi</th>
                                <th>Pembeli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->Produk->nama}}</td>
                                <td>{{$d->jumlah_barang}}</td>
                                <td>{{number_format($d->total_harga,2,',','.')}}</td>
                                <td>
                                    <a href="/transaksi/detail/{{$d->id_transaksi}}">{{$d->id_transaksi}}</a>
                                </td>
                                <td>{{$d->Customer->nama}}</td>
                                <td>
                                    <a href="/pesanan/{{$d->id}}/edit" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" onclick="Delete('/pesanan/{{$d->id}}/hapus')">Hapus</button>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection