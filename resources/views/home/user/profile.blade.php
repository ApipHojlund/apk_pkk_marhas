@extends('layouts.master')
@section('tittle','profile')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>Profile {{$profile->nama}}</h4> 
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th colspan="3">{{$profile->nama}}</th>
                        </tr>
                        <tr>
                            <td>Id User</td>
                            <td align="right">:</td>
                            <td>{{$profile->id}}</td>
                        </tr>
                        <tr>
                            <td>nama</td>
                            <td align="right">:</td>
                            <td>{{$profile->nama}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td align="right">:</td>
                            <td><a target="_blank" href="https://wa.me/{{$profile->no_telp}}">{{$profile->no_telp}}</a></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td align="right">:</td>
                            <td rowspan="3"><img width="100%" height="100%" src="{{asset("image/user/$profile->foto")}}" alt="profile photo"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td align="right">:</td>
                            <td rowspan="2">{{$profile->alamat}}</td>
                        </tr><tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>username</td>
                            <td align="right">:</td>
                            <td>{{$profile->username}}</td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td align="right">:</td>
                            <td>{{$profile->level}}</td>
                        </tr>
                        <tr>
                            <td>tanggal daftar</td>
                            <td align="right">:</td>
                            <td>{{$profile->created_at}}</td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection 
            