@extends('layouts.main')
@section('title')
    Tambah Bukti Pembayaran| NugrahaTrans
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Bukti Pembayaran</h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('bukti.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Sewa</label>
                                    <select class="form-control" id="sewa_id" name="sewa_id" required>
                                        <option value="">--Pilih ID Sewa--</option>
                                        @foreach ($sewa as $data)
                                            <option value="{{$data->id}}">{{$data->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="buktiPembayaran">Bukti Pembayaran</label>
                                    <input type="file" class="form-control" id="buktiPembayaran" name="buktiPembayaran" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('bukti.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection 


