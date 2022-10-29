@extends('layouts.main')
@section('title')
    Edit Data Pengeluaran | NugrahaTrans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Edit Data Pengeluaran</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('pengeluaran.update', $pengeluaran->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pengeluaran</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="ID Pengeluaran" name="id" required value="{{$pengeluaran->id}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Pengeluaran</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Pengeluaran" name="tanggalPengeluaran" required value="{{$pengeluaran->tanggalPengeluaran}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Pengeluaran</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jenis Pengeluaran" name="jenisPengeluaran" required value="{{$pengeluaran->jenisPengeluaran}}">
                          </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Pengeluaran</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Pengeluaran" name="jumlahPengeluaran" required value="{{$pengeluaran->jumlahPengeluaran}}">
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pengeluaran.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection