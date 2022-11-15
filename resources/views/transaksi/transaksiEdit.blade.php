@extends('layouts.main')
@section('title')
    Edit Data Transaksi | NugrahaTrans
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Edit Data Transaksi</h5>
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
                <form method="POST" action="{{route('transaksi.update',$transaksi->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIK</label>
                                    <select class="form-control" id="customer_id" name="Customer" required>
                                        <option value="">--Pilih NIK--</option>
                                        @foreach ($customer as $data)
                                            <option value="{{ $data->id }}" {{ $transaksi->customer_id ? 'selected' : '' }}>{{ $data->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Sewa</label>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Tanggal Sewa" id="tanggalSewa" name="tanggalSewa" required value="{{$transaksi->tanggalSewa}}">
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Ambil</label>
                                    <input type="number" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Tanggal Ambil" onkeyup="sum();" onkeyup="date();" id="tanggalAmbil" name="tanggalAmbil"
                                        value="{{$transaksi->tanggalAmbil}}" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Kembali</label>
                                    <input type="number" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Tanggal Kembali" onkeyup="sum();" onkeyup="date();" id="tanggalKembali"
                                        name="tanggalKembali" value="{{$transaksi->tanggalKembali}}" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Merk</label>
                                    <select class="form-control" id="katalog_id" name="Katalog">
                                        <option value="">--Pilih Merk--</option>
                                        @foreach ($katalog as $data)
                                            <option value="{{ $data->id }}" {{ $transaksi->katalog_id ? 'selected' : '' }}>{{ $data->merk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" onkeyup="sum();" onkeyup="date();" value="{{$transaksi->jumlah}}">
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" onkeyup="sum();" value="{{$transaksi->harga}}">
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Pembayaran</label>
                                    <input type="number" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Total Pembayaran" onkeyup="sum();" id="totalPembayaran"
                                        name="totalPembayaran" value="{{$transaksi->totalPembayaran}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('transaksi.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function date(){
        var date1 = document.getElementById('tanggalAmbil').value;
        var date2 = document.getElementById('tanggalKembali').value;
        var results =  (parseInt(date2) - parseInt(date1));
        if (!isNaN(results)) {
            document.getElementById('jumlah').value = results;
        }
    }
    </script>   
<script>
    function sum() {
        var txFirstNumberValue = document.getElementById('harga').value;
        var txThirdNumberValue = document.getElementById('jumlah').value;
        var result = (parseInt(txFirstNumberValue) * parseInt(txThirdNumberValue));
        if (!isNaN(result)) {
            document.getElementById('totalPembayaran').value = result;
        }
    }
</script>



