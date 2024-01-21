@extends('layouts.master')
@section('tittle','jenis produk')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>
                    <p class="card-description"> Basic form layout </p>
                    
                    <form class="forms-sample"  action="/jenis/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleSelectGender">Tipe</label>
                            <input type="text" name="tipe" 
                             class="form-control" required id="exampleInputjenisname1" placeholder="Tipe">
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