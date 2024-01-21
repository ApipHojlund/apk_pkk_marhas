@extends('layouts.master')
@section('tittle','pesanan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample"  action="/pesanan/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleSelectGender">Produk</label>
                           <select class="form-control" name="id_produk" id="">
                                @foreach ($produk as $produk)
                                    <option value="{{$produk->id}}">{{$produk->nama}}</option>
                                @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Pemesan</label>
                           <select class="form-control" name="id_customer" id="">
                                @foreach ($customer as $customer)
                                    <option value="{{$customer->id}}">{{$customer->nama}}</option>
                                @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" required
                            class="form-control" required id="exampleInputUsername1" placeholder="jumlah barang">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection