@extends('layouts.master')
@section('tittle','produk')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data</h4>
                    <p class="card-description"> Basic form layout </p>
                    
                    <form class="forms-sample" enctype="multipart/form-data" action="/produk/{{$produk->id}}/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama</label>
                            <input type="text" name="nama" required value="{{$produk->nama}}"
                             class="form-control" required id="exampleInputUsername1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">harga</label>
                            <input type="number" name="harga" required value="{{$produk->harga}}"
                            class="form-control" required id="exampleInputUsername1" placeholder="Harga Per Pieces">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">stok</label>
                            <input type="number" name="stok" required value="{{$produk->stok}}"
                            class="form-control" required id="exampleInputUsername1" placeholder="Stok">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Foto Produk</label>
                            <input
                                type="file" required
                                class="form-control"
                                name="foto"
                                id=""
                                placeholder="insert your poto"
                                aria-describedby="fileHelpId"
                            />
                            <div id="fileHelpId" class="form-text"></div>
                           </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jenis Produk</label>
                           <select class="form-control" name="id_jenis" id="">
                                @foreach ($jenis as $jenis)
                                <option value="{{$produk->id_jenis}}">{{$produk->Jenis_produk->tipe}}</option>
                                <option value="{{$jenis->id}}">{{$jenis->tipe}}</option>
                                @endforeach
                           </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Seller</label>
                               <select class="form-control" name="id_seller" id="">
                                   <option value="{{$produk->id_seller}}">{{$produk->Seller->nama}}</option>
                                    @foreach ($seller as $seller)
                                    <option value="{{$seller->id}}">{{$seller->nama}}</option>
                                    @endforeach
                               </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea class="form-control" required placeholder="Deskripsi" name="deskripsi" id="" rows="3">
                                    {{$produk->deskripsi}}
                                </textarea>
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