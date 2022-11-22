@extends('layouts.main')
@section('title')
    Edit Data Pemasukan | NugrahaTrans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Edit Data Pemasukan</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('pemasukan.update', $pemasukan->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pemasukan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="ID Pemasukan" name="id" required value="{{$pemasukan->id}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Pemasukan</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Pemasukan" name="tanggalPemasukan" required value="{{$pemasukan->tanggalPemasukan}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Pemasukan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jenis Pemasukan" name="jenisPemasukan" required value="{{$pemasukan->jenisPemasukan}}">
                          </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Pemasukan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Pemasukan" name="jumlahPemasukan" required value="{{$pemasukan->jumlahPemasukan}}">
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pemasukan.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection