@extends('layouts.master')
@section('tittle','produk')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th colspan="3">{{$produk->nama}}</th>
                        </tr>
                        <tr>
                            <td>Id Produk</td>
                            <td align="right">:</td>
                            <td>{{$produk->id}}</td>
                        </tr>
                        <tr>
                            <td>nama Produk</td>
                            <td align="right">:</td>
                            <td>{{$produk->nama}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Produk</td>
                            <td align="right">:</td>
                            <td>{{$produk->Jenis_produk->tipe}}</td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td align="right">:</td>
                            <td rowspan="2"><img height="200px" width="200px" src="{{asset("image/produk/$produk->foto")}}" alt=""></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td align="right">:</td>
                            <td>{{$produk->harga}}</td>
                        </tr>
                        <tr>
                            <td>stok</td>
                            <td align="right">:</td>
                            <td>{{$produk->stok}}</td>
                        </tr>
                        <tr>
                            <td>terjual</td>
                            <td align="right">:</td>
                            <td>{{$produk->terjual}}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td align="right">:</td>
                            <td rowspan="3">{{$produk->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/chart/add/{{$produk->id}}" class="btn btn-warning">Tambah Keranjang</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection