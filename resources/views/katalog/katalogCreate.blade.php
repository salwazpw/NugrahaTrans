@extends('layouts.main')
@section('title')
    Tambah Data Katalog | Nugraha Trans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Katalog</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('katalog.store')}}">
                @csrf
                <div class="col-md-12 col-xs-12">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">PLAT</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="PLAT" name="id" required>
                      </div>
                </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kendaraan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Bus, Mobil, Elf" name="jenisKendaraan" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Merk</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Merk" name="merk" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Warna</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Warna" name="warna" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="gambarKendaraan">Gambar Kendaraan</label>
                            <input type="file" class="form-control"  name="gambarKendaraan" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Sewa per Hari</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Catatan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Catatan" name="catatan" required>
                          </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('katalog.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection
