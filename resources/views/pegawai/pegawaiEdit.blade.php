@extends('layouts.main')
@section('title')
    Edit Data Pegawai | NugrahaTrans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Edit Data Pegawai</h5>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
              @endif
              <form method="POST" enctype="multipart/form-data"  action="{{route('pegawai.update', $pegawai->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="NIP" name="id" required value="{{$pegawai->id}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Pegawai" name="namaPegawai" required value="{{$pegawai->namaPegawai}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" value="{{$pegawai->jabatan}}">
                                <option value="Admin">Admin</option>
                                <option value="Sopir">Sopir</option>
                            </select>
                            @if ($errors->has('jabatan'))
                            <div class="error">{{ $errors->first('jabatan') }}</div>
                        @endif
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="No Telepon" name="telepon" required value="{{$pegawai->telepon}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required value="{{$pegawai->alamat}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Kelamin</label>
                            <select class="form-control" id="jenisKelamin" name="jenisKelamin" value="{{$pegawai->jenisKelamin}}">
                                <option value="P">Perempuan</option>
                                <option value="L">Laki</option>
                            </select>
                          </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gaji</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Gaji" name="gaji" required value="{{$pegawai->gaji}}">
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pegawai.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection