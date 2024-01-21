@extends('layouts.master')
@section('tittle','transaksi')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Transaksi
                        <a href="/transaksi/cetak" target="_blank" class="btn btn-primary">Cetak <i class="icon-printer"></i></a>
                        @can('seller')
                        <a href="/transaksi/create" class="btn btn-info float-right">Tambah</a>
                        @endcan
                    </h4>
                    </p>
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>status</th>
                                <th>Petugas</th>
                                {{-- @foreach ($transaksi as $trans)
                                @if ($trans->id_user == null)
                                @else
                                  <td>Petugas</td>
                                @endif
                                @endforeach --}}
                                @can('seller')
                                <th>Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @foreach ($transaksi as $trans)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$trans->id}}</td>
                                <td>{{number_format($trans->total_bayar,2,',','.')}}</td>
                                <td>{{$trans->tanggal}}</td>
                                <td>{{$trans->status}}</td>
                                <td>{{$trans->User->nama}}</td>
                                {{-- @if ($trans->id_user == null)
                                @else
                                <td>{{$trans->User->nama}}</td>
                                @endif --}}
                                @can('seller')
                                <td>
                                    <a href="/transaksi/{{$trans->id}}/edit" class="btn btn-warning">edit</a>
                                    <button class="btn btn-danger" onclick="Delete('/transaksi/{{$trans->id}}/hapus')">Hapus</button><br><br>
                                    <a target="_blank" class="btn btn-success" href="/transaksi/{{$trans->id}}/struk">Struk <i class="icon-printer"></i></a>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                            {{-- @foreach ($transaksi as $trans)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$trans->id_transaksi}}</td>
                                <td>
                                    {{number_format($trans->total_harga,2,',','.')}}
                                </td>
                                <td>{{number_format($trans->Transaksi->total_bayar,2,',','.')}}</td>
                                <td>{{$trans->Transaksi->tanggal}}</td>
                                <td>{{$trans->Transaksi->status}}</td>
                                @if ($trans->id_user == null)
                                @else
                                <td>{{$trans->Transaksi->User->nama}}</td>
                                @endif
                                @can('seller')
                                <td>
                                    <a href="/transaksi/{{$trans->Transaksi->id}}/edit" class="btn btn-warning">edit</a>
                                    <button class="btn btn-danger" onclick="Delete('/transaksi/{{$trans->Transaksi->id}}/hapus')">Hapus</button><br><br>
                                    <a target="_blank" class="btn btn-success" href="/transaksi/{{$trans->Transaksi->id}}/struk">Struk <i class="icon-printer"></i></a>
                                </td>
                                @endcan
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection