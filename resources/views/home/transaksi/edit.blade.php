@extends('layouts.master')
@section('tittle','transaksi')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" action="/transaksi/{{$transaksi->id}}/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tanggal Pembayaran</label>
                            <input type="date" required name="tanggal" value="{{$transaksi->tanggal}}"
                            class="form-control" id="exampleInputUsername1" placeholder="Tanggal">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Status</label>
                           <select name="status" id="" class="form-control">
                                <option value="dalam antrian">dalam antrian</option>
                                <option value="terbayar">terbayar</option>

                           </select>
                        </div> 

                        {{-- <div class="form-group">
                            <label for="exampleInputUsername1">Keterangan</label>
                            <input type="text" required name="keterangan" value="{{$transaksi->keterangan}}"
                            class="form-control" id="exampleInputUsername1" placeholder="Keterangan">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputUsername1">Jumlah Bayar</label>
                            <input type="number" required name="total_bayar" value="{{$transaksi->total_bayar}}"
                            class="form-control" id="exampleInputUsername1" placeholder="Jumlah Bayar">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Pesanan</label>
                            <select class="form-control form-select-lg" name="id_pesanan" id="">
                                @foreach ($detail as $detail)
                                <option value="{{$transaksi->id_pesanan}}">{{$transaksi->id_pesanan}} ||Harga : <small>Rp. {{number_format($transaksi->total_harga,2,',','.')}} || Barang : {{$transaksi->Detail_transaksi->Produk->nama}}</option>
                                <option value="{{$detail->id}}">
                                    {{$detail->id}} ||Harga : <small>Rp. {{number_format($detail->total_harga,2,',','.')}} || Barang : {{$detail->Produk->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection