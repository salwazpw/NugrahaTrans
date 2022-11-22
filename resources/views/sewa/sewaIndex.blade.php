@extends('layouts.main')
@section('title')
Data Sewa | NugrahaTrans
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Sewa</h1><br>
                    <h3> <a class="btn btn-success" href="{{route('sewa.create')}}">+ Tambah Data</a></h3>
                </div><!-- /.col -->
                <div class="col-md-6"><br><br><br>
                    <div class="float-right">
                        <form class="form-inline my-23 my-lg-0" action="{{url()->current()}}" method="GET">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{request('keyword')}}">
                            {{-- <button class="btn btn-icons btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button> --}}
                            <button type="submit" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                </div>
            </div><!-- /.col -->
        </div>
        <div class="alert-option">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
                @endif

            </div>
        </div>

        <div class="table-hover">
            <table class="table  table-primary">
                <thead class="table bg-primary text-white">
                    <tr>
                        @if (Auth::check())
                        @if (auth()->user()->level=="admin")
                        <th scope="col">NIK</th>
                        @endif
                        @endif
                        <th scope="col">Kendaraan</th>
                        <th scope="col">Tanggal Sewa</th>
                        <th scope="col">Tanggal Ambil</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Total Hari</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sewa as $data)
                    <tr>
                        @if (Auth::check())
                        @if (auth()->user()->level=="admin")
                        <td>{{$data->nik}}</td>
                        @endif
                        @endif
                        <td>{{$data->katalog->plat }}</td>
                        <td>{{date('j M Y', strtotime($data->tanggalSewa))}}</td>
                        <td>{{date('j M Y', strtotime($data->tanggalAmbil)) }}</td>
                        <td>{{date('j M Y', strtotime($data->tanggalKembali))}}</td>
                        <td>{{$data->hari }}</td>
                        <td>Rp. {{number_format($data->harga, 0, ",", ".")}}</td>
                        <td>{!! $data->statusbayar !!}</td>
                        <td>{{$data->totalPembayaran}}</td>
                        <td>
                            <form action="{{ route('sewa.destroy',  $data->id) }}" method="POST">
                                <a class="btn btn-icons btn-light" target="_blank" href="{{route('payment', $data->id)}}"><i class="fas fa-print"></i></a>
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="paginate">
            <div class="container">
                <div class="row">
                    <div class="detail-data col-md-12">
                        <p>Page : {!! $sewa->currentPage() !!} <br />
                            Jumlah Data : {!! $sewa->total() !!} <br />
                            Data Per Halaman : {!! $sewa->perPage() !!} <br />
                        </p>
                    </div>
                    <div class="mx-auto">
                        <div class="paginate-button col-md-12">
                            {{ $sewa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record? `,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
</div>
</div>
@endsection

@section('js')
<script>
    $('#sewa').addClass('active');
</script>
@endsection