@extends('layouts.main')
@section('title')
    Detail Data Katalog
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Katalog</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Plat</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$katalog->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Kendaraan</label>
                            <input type="text" class="form-control" id="jenisKendaraan" name="jenisKendaraan" value="{{$katalog->jenisKendaraan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" value="{{$katalog->merk}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna" value="{{$katalog->warna}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar Kendaraan</label><br>
                            <img width="600px" height="500px" src="{{ asset('storage/' . $katalog->gambarKendaraan) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" readonly value="{{$katalog->harga}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan" readonly value="{{$katalog->catatan}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('katalog.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection