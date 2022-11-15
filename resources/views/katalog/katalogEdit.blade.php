@extends('layouts.main')
@section('title')
    Edit Data Katalog | Nugraha Trans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
          <h5 class="card-header bg-primary text-white">Edit Data Katalog</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('katalog.update',$katalog->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Plat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Plat" name="plat" required value="{{$katalog->plat}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kendaraan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Bus, Mobil, Elf" name="jenisKendaraan" required value="{{$katalog->jenisKendaraan}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Merk</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Merk" name="merk" required value="{{$katalog->merk}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Warna</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Warna" name="warna" required value="{{$katalog->warna}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_katalog">Gambar Kendaraan</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Gambar Kendaraan" name="gambarKendaraan" value="{{$katalog->gambarKendaraan}}"><br>
                            <img width="150px" src="{{asset('storage/'. $katalog->gambarKendaraan)}}" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required value="{{$katalog->harga}}"> 
                          </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Status</label>
                          <select class="form-control" id="status" name="status">
                            <option value="Tersewa" {{ $katalog->status == "Tersewa" ? 'selected' : '' }}>Tersewa</option>
                            <option value="Tersedia" {{ $katalog->status == "Tersedia" ? 'selected' : '' }}>Tersedia</option>
                        </select>
                        </div>
                    </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Informasi</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Informasi" name="informasi" required value="{{$katalog->informasi}}"> 
                      </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Catatan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Catatan" name="catatan" required value="{{$katalog->catatan}}">
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('katalog.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection