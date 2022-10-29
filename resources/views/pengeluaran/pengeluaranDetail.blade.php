@extends('layouts.main')
@section('title')
    Detail Data Pengeluaran | Nugraha Trans
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Pengeluaran</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pengeluaran</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$pengeluaran->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Pengeluaran</label>
                            <input type="text" class="form-control" id="tanggalPengeluaran" name="tanggalPengeluaran" value="{{$pengeluaran->tanggalPengeluaran}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Pengeluaran</label>
                            <input type="text" class="form-control" id="jenisPengeluaran" name="jenisPengeluaran" value="{{$pengeluaran->jenisPengeluaran}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Pengeluaran</label>
                            <input type="text" class="form-control" id="jumlahPengeluaran" name="jumlahPengeluaran" value="{{$pengeluaran->jumlahPengeluaran}}" readonly>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('pengeluaran.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection