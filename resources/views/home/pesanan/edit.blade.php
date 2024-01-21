@extends('layouts.master')
@section('tittle','pesanan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample"  action="/pesanan/{{$pesanan->id}}/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleSelectGender">Produk</label>
                           <select class="form-control" name="id_produk" id="">
                               <option value="{{$pesanan->id_produk}}">{{$pesanan->Produk->nama}}</option>
                                @foreach ($produk as $produk)
                                <option value="{{$produk->id}}">{{$produk->nama}}</option>
                                @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Pemesan</label>
                           <select class="form-control" name="id_customer" id="">
                                <option value="{{$pesanan->id_customer}}">{{$pesanan->Customer->nama}}</option>
                                @foreach ($customer as $customer)
                                    <option value="{{$customer->id}}">{{$customer->nama}}</option>
                                @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" value="{{$pesanan->jumlah_barang}}"
                            class="form-control" required id="exampleInputUsername1" placeholder="jumlah barang">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-danger mr-2">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection