@extends('layouts.master')
@section('tittle','user')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>Dalam Keranjang
                    </h4>
                </div>
                <div class="card-body">
                    {{-- <form action="{{ route('keranjang.update') }}" method="POST"> --}}
                        <form action="{{ route('chart.checkout') }}" method="post">
                        {{-- @foreach ($detail as $d)
                        <form action="/keranjang/update/{{$d->id_produk}}" method="post">
                        @endforeach --}}
                        @csrf
                        {{-- @method('patch') --}}
                        <table class="table-striped table">
                            <thead>
                                <tr>
                                    <th><b>
                                        Pilih Pesanan    
                                </b></th>
                                <th><b>Kode Pesanan</b></th>
                                <th><b>produk pesanan</b></th>
                                <th><b>jumlah barang</b></th>
                                <th><b>total harga</b></th>
                                <th><b>Hapus</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $d)
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="selected_items[]" id="" value="{{$d->id}}"> Pilih Transaksi
                                        </label>
                                    </div>
                                </td>
                                <td>{{$d->id}}</td>
                                <td>{{$d->Product->nama}}</td>
                                <td>
                                    <input type="number" name="jumlah_barang[{{ $d->id }}]" value="{{$d->jumlah_barang}}">   
                                </td>
                                <td>{{number_format($d->total_harga,2,',','.')}}</td>
                                <td>
                                    <button class="btn btn-danger" onclick="Delete('/chart/{{$d->id}}/hapus')">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="5" align="right">Total Harga :</th>
                                <th>
                                    Rp.{{number_format($jumlah_total->total_price,2,',','.')}}
                                </th>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    <label for="" class="form-label">Jumlah Bayar</label>
                                </th>
                                <th>
                                    :
                                </th>
                                <th colspan="4">
                                    <input
                                        type="text"
                                        name="total_bayar"
                                        id=""
                                        class="form-control"
                                        placeholder="Jumlah Bayar"
                                        aria-describedby="helpId" required
                                    />
                                    <small id="helpId" class="text-muted">Jumlah Bayar</small>
                                    </form>
                                    
                                </th>
                            </tr>
                            <tr>
                                <th colspan="6">
                                    {{-- <button type="submit" class="btn btn-lg btn-primary float-left">Update Jumlah Keranjang</button> --}}
                                    <button type="submit" formaction="/chart/checkout" class="btn btn-lg btn-success float-right">Checkout</button>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
