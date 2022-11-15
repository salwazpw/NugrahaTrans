@extends('layouts.main')
@section('title')
    Detail Data User | Nugraha Trans
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data User</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">KTP</label>
                            <img width="600px" height="500px" src="{{ asset('storage/' . $user->foto) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NIK</label>
                            <input type="text" class="form-control" id="namauser" name="namauser" value="{{$user->nik}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$user->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{$user->username}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telepon</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->no_hp}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly value="{{$user->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenisKelamin" name="jenisKelamin" readonly value="{{$user->jenis_kelamin}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="gaji" name="gaji" value="{{$user->tanggal_lahir}}" readonly>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('user.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection