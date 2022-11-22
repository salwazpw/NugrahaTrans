<?php

use Carbon\Carbon;

$date = Carbon::now()->isoFormat('Y-M-D');
?>
@extends('layouts.main')
@section('title')
    Tambah Data Sewa | NugrahaTrans
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Sewa</h5>
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
                <form method="POST" action="{{ route('sewa.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @if (auth()->user()->level=="admin")
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIK</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"
                                        placeholder="NIK" id="nik" name="nik" required>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Merk</label>
                                    <select class="form-control" id="katalog_id" name="katalog_id" required>
                                        <option value="">--Pilih Merk--</option>
                                        @foreach ($katalog as $data)
                                            <option value="{{$data->id}}">{{$data->merk}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Sewa</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Tanggal Sewa" id="tanggalSewa" name="tanggalSewa"
                                        value="<?php echo $date; ?>" readonly required>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Ambil</label>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Tanggal Ambil" id="tanggalAmbil" name="tanggalAmbil"
                                        required onchange="calculateDays()">
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Kembali</label>
                                    <input type="date" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Tanggal Kembali" id="tanggalKembali"
                                        name="tanggalKembali"required onchange="calculateDays()">
                                </div>
                            </div>

                            {{-- <button onclick=> Hitung </button> --}}
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hari</label>
                                    <input type="number" class="form-control" id="hari" name="hari" onchange="calculateDays()"readonly>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" readonly onchange="calculateDays()">
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Total Pembayaran</label>
                                    <input type="number" class="form-control" id="totalPembayaran" name="totalPembayaran" readonly onchange="calculateDays()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('sewa.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection 


@section('js')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('select#katalog_id').on('change',function(e){
            // console.log(response);
            var selected_katalog = $(this).children("option:selected").val();
            $.ajax({
                type:"GET",
                dataType:"json",
                url:'/getTransaksi/'+selected_katalog,
                success:function(response){
                    console.log(response);
                    $('#harga').val(response.harga)
                }
            })
        });
    });



</script>
@endsection

<script>
        function calculateDays(){
        const d1 = document.getElementById('tanggalAmbil');
        const d2 = document.getElementById('tanggalKembali');
        const txSecondNumberValue = document.getElementById('harga').value;

        const dateOne = new Date(d1.value);
        const dateTwo = new Date(d2.value);
        console.log(dateDiffInDays(dateOne, dateTwo))
    }

    function dateDiffInDays(a, b){
        const _MS_PER_DAY = 1000 * 60 * 60 *24;
        const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
        const harga = document.getElementById('harga').value;
        const result = Math.floor((utc2 - utc1) / _MS_PER_DAY );
        console.log(calculate(result, harga))
        if(!isNaN(result)){
          document.getElementById('hari').value = result;
        }
    }

    function calculate(a, b){
        const hasil = a*b;
        if(!isNaN(hasil)){
          document.getElementById('totalPembayaran').value = hasil;
        }
    }
</script>


