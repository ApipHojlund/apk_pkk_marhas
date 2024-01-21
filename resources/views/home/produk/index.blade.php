@extends('layouts.master')
@section('tittle','produk')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Produk
                        @can('seller')
                        <a href="/produk/create" class="btn btn-primary">Tambah</a>
                        @endcan
                </h4>
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Terjual</th>
                                <th>Jenis</th>
                                @can('seller')
                                <th>Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>
                                    @can('seller')
                                    <a href="/produk/{{$p->id}}/detail">{{$p->nama}}</a>
                                    @endcan
                                    @can('customer')
                                    {{$p->nama}}    
                                    @endcan
                                </td>
                                <td><img class="img-xs rounded-circle ml-2" src="{{asset("image/produk/$p->foto")}}" alt=""></td>
                                <td>{{number_format($p->harga,2,',','.')}}</td>
                                <td>{{$p->stok}}</td>
                                <td>{{$p->terjual}}</td>
                                <td>{{$p->Jenis_produk->tipe}}</td>
                                @can('seller')
                                <td>
                                    <a href="/produk/{{$p->id}}/edit" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" onclick="Delete('/produk/{{$p->id}}/hapus')">Hapus</button><br><br>
                                    <a href="/chart/add/{{$p->id}}" class="btn btn-primary">Tambah Keranjang <i class="icon icon-basket"></i></a>
                                </td>
                                @endcan
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