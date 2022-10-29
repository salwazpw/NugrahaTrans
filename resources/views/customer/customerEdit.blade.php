@extends('layouts.main')
@section('title')
    Edit Data Customer | Nugraha Trans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
          <h5 class="card-header bg-primary text-white">Edit Data Customer</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('customer.update',$customer->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="NIK" name="id" required value="{{$customer->id}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama" name="namaCustomer" required value="{{$customer->namaCustomer}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required value="{{$customer->alamat}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No. Telepon</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="No. Telepon" name="telepon" required value="{{$customer->telepon}}">
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('customer.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection