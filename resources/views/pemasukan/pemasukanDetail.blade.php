@extends('layouts.main')
@section('title')
    Detail Data Pemasukan | Nugraha Trans
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Pemasukan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pemasukan</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$pemasukan->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Pemasukan</label>
                            <input type="text" class="form-control" id="tanggalPemasukan" name="tanggalPemasukan" value="{{$pemasukan->tanggalPemasukan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Pemasukan</label>
                            <input type="text" class="form-control" id="jenisPemasukan" name="jenisPemasukan" value="{{$pemasukan->jenisPemasukan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Pemasukan</label>
                            <input type="text" class="form-control" id="jumlahPemasukan" name="jumlahPemasukan" value="{{$pemasukan->jumlahPemasukan}}" readonly>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('pemasukan.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection