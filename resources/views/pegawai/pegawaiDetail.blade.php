@extends('layouts.main')
@section('title')
    Detail Data Pegawai | Nugraha Trans
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Pegawai</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$pegawai->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" value="{{$pegawai->namaPegawai}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$pegawai->jabatan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{$pegawai->telepon}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$pegawai->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly value="{{$pegawai->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenisKelamin" name="jenisKelamin" readonly value="{{$pegawai->jenisKelamin}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gaji</label>
                            <input type="text" class="form-control" id="gaji" name="gaji" value="{{$pegawai->gaji}}" readonly>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('pegawai.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection