@extends('layouts.master')
@section('tittle','produk')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Terjual</th>
                                <th>Tanggal_Expired</th>
                                <th>id jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $produk)
                            <tr>
                                <td>
                                    <a href="/produk/{{$produk->id}}/detail">{{$produk->nama}}</a>
                                </td>
                                <td><img class="img-xs rounded-circle ml-2" src="{{asset("image/produk/$produk->foto")}}" alt=""></td>
                                <td>{{number_format($produk->harga,2,',','.')}}</td>
                                <td>{{$produk->stok}}</td>
                                <td>{{$produk->terjual}}</td>
                                <td>{{$produk->tanggal_exp}}</td>
                                <td>{{$produk->Jenis_produk->tipe}}</td>
                                <td>
                                    <a href="/chart/add/{{$produk->id}}" class="btn btn-warning">Tambah Keranjang</a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Maaf',
            text: '{{ session('error') }}',
        });
    </script>
    @endif
@endsection