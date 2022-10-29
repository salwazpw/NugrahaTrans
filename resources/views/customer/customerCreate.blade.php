@extends('layouts.main')
@section('title')
    Tambah Data Customer | Nugraha Trans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Customer</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('customer.store')}}">
                @csrf
                <div class="col-md-12 col-xs-12">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="NIK" name="id" required>
                      </div>
                </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama" name="namaCustomer" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No. Telepon</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="No. Telepon" name="telepon" required>
                          </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('customer.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection
