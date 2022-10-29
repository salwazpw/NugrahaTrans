@extends('layouts.main')
@section('title')
    Tambah Data Pengeluaran | Nugraha Trans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
      <h5 class="card-header bg-primary text-white">Tambah Data Pengeluaran</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('pengeluaran.store')}}">
                @csrf
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pengeluaran</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="ID Pengeluaran" name="id" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Pengeluaran</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Pengeluaran" name="tanggalPengeluaran" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Pengeluaran</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp"placeholder="Jenis Pengeluaran" name="jenisPengeluaran" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Pengeluaran</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Pengeluaran" name="jumlahPengeluaran" required>
                          </div>
                    </div>                   
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pengeluaran.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection