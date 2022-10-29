@extends('layouts.main')
@section('title')
    Detail Data Customer | Nugraha Trans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Customer</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$customer->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="namaCustomer" name="namaCustomer" value="{{$customer->namaCustomer}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$customer->alamat}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No. Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{$customer->telepon}}" readonly>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('customer.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection