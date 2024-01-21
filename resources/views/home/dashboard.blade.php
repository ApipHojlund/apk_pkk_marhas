@extends('layouts.master')
@section('tittle','dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Quick Action Toolbar Ends-->
    @can('admin')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                <h5 class="font-weight-semibold">Ringkasan Laporan</h5> <span class="ml-auto"></span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                        <div class=" col-md -6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Jumlah Jenis</span>
                                <h4>{{$jumlah_jenis}}</h4>
                                <a href="/jenis"><span class="report-count"> More Info <i class="icon-sm icon-arrow-right-circle"></i></span></a>
                            </div>
                            <div class="inner-card-icon bg-success">
                                <i class="icon-rocket"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Jumlah Produk</span>
                                <h4>{{$jumlah_produk}}</h4>
                                <a href="/produk"><span class="report-count"> More Info <i class="icon-sm icon-arrow-right-circle"></i></span></a>
                            </div>
                            <div class="inner-card-icon bg-danger">
                                <i class="icon-briefcase"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Jumlah Pesanan</span>
                                <h4>{{$jumlah_pesanan}}</h4>
                                <a href="/pesanan"><span class="report-count"> More Info <i class="icon-sm icon-arrow-right-circle"></i></span></a>
                            </div>
                            <div class="inner-card-icon bg-warning">
                                <i class="icon-globe-alt"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Jumlah Transaksi</span>
                                <h4>
                                    @if ($total_minggu->total_price == null)
                                    0
                                @else <td>Rp.{{number_format($total_minggu->total_price,2,',','.')}}</td>
                                    
                                @endif
                                </h4>
                                <span class="report-count"> {{$jumlah_trans}} Terlapor <i class="icon-sm icon-paper-plane"></i></span>
                            </div>
                            <div class="inner-card-icon bg-primary">
                                <i class="icon-diamond"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        <h4 class="card-title mb-sm-0">Tabel Riwayat</h4>
                    </div>
                    <div class="table-responsive">
                        {{-- <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Total Harga</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tanggal Bayar</th>
                                    <th>status</th>
                                    <th>keterangan</th>
                                    <th>Petugas</th>
                                    <th>Kode Pesanan</th>
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
                                    <td>{{number_format($trans->Detail_transaksi->total_harga,2,',','.')}}</td>
                                    <td>{{number_format($trans->total_bayar,2,',','.')}}</td>
                                    <td>{{$trans->tanggal}}</td>
                                    <td>{{$trans->status}}</td>
                                    <td>{{$trans->keterangan}}</td>
                                    <td>{{$trans->User->nama}}</td>
                                    <td>{{$trans->id_pesanan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        <h4 class="card-title mb-sm-0">Paling Laku</h4>
                    </div>
                    <b><h2>
                        @if(count($produkTerlaris) > 0)
                        <ul>
                            @foreach($produkTerlaris as $produk)
                             <li> 
                                <img class="img-lg rounded-circle ml-2" src="{{asset("image/produk/$produk->foto")}}" alt="">
                                {{ $produk->nama }} - Jumlah Terjual: {{ $produk->terjual }}
                             </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Tidak ada data produk terjual.</p>
                    @endif
                    </h2></b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection