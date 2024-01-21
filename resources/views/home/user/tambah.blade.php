@extends('layouts.master')
@section('tittle','user')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>
                    <p class="card-description"> Basic form layout </p>
                    
                    <form class="forms-sample" enctype="multipart/form-data" action="/user/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama</label>
                            <input type="text" name="nama" 
                             class="form-control" required id="exampleInputUsername1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">no_telp</label>
                            <input type="text" name="no_telp" 
                            class="form-control" required id="exampleInputUsername1" placeholder="Nama">
                            <small id="helpId" class="form-text text-muted">Gunakan: 6281-xxx-xxx tanpa symbol <b>+</b></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">alamat</label>
                            <input type="text" name="alamat" 
                            class="form-control" required id="exampleInputUsername1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">username</label>
                            <input type="text" name="username" 
                            class="form-control" required id="exampleInputUsername1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">password</label>
                            <input type="password" name="password" 
                             class="form-control" required id="exampleInputUsername1" placeholder="Nama">
                            </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleSelectGender">Level</label>
                           <select class="form-control" name="level" id="">
                            <option value="admin">Admin</option>
                            <option value="seller">Seller</option>
                            <option value="customer">Customer</option>
                           </select>
                           <div class="mb-3">
                            <label for="" class="form-label">Pas Foto</label>
                            <input required
                                type="file"
                                class="form-control" required
                                name="foto"
                                id=""
                                placeholder="insert your p"
                                aria-describedby="fileHelpId"
                            />
                            <div id="fileHelpId" class="form-text"></div>
                           </div>
                           
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-danger mr-2">Reset</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection