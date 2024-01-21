@extends('layouts.master')
@section('tittle','user')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Pengguna 
                        {{-- @can('admin') --}}
                        <a href="/user/create" class="btn btn-primary">Tambah</a>
                        {{-- @endcan --}}
                    </h4>
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>No_telp</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                @can('admin')
                                <th>Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                                
                           
                            <tr>
                                <td>{{$u->id}}</td>
                                <td><img class="img-xs rounded-circle ml-2" src="{{asset("image/user/$u->foto")}}" alt=""></td>
                                <td>{{$u->nama}}</td>
                                <td>{{$u->no_telp}}</td>
                                <td>{{$u->alamat}}</td>
                                <td>{{$u->username}}</td>
                                @can('admin')
                                <td>
                                    <a href="/user/{{$u->id}}/edit" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" onclick="Delete('/user/{{$u->id}}/hapus')">Hapus</button>
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