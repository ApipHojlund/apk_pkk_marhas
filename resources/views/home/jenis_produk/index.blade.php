@extends('layouts.master')
@section('tittle','jenis produk')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Jenis Produk
                    @can('admin')
                        <a href="/jenis/create" class="btn btn-primary">Tambah</a>
                    @endcan
                </h4>
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>id jenis</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis as $j)
                            <tr>
                                <td>{{$j->id}}</td>
                                <td>{{$j->tipe}}</td>
                              
                                <td>
                                    <a href="/jenis/{{$j->id}}/edit" class="btn btn-warning">Edit</a>
                                   
                                    <button class="btn btn-danger" onclick="Delete('/jenis/{{$j->id}}/hapus')">Hapus</button>
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