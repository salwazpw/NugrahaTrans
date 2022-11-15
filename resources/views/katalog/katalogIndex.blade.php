@extends('layouts.main')
@section('title')
    Data Katalog Kendaraan | Nugraha Trans
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Katalog Kendaraan</h1><br>
                        <h3> <a class="btn btn-success" href="{{ route('katalog.create') }}">+ Tambah Data</a></h3>
                    </div><!-- /.col -->
                    <div class="col-md-6"><br><br><br>
                        <div class="float-right">
                            <form class="form-inline my-23 my-lg-0" action="{{ url()->current() }}" method="GET">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                    name="keyword" value="{{ request('keyword') }}">
                                {{-- <button class="btn btn-icons btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button> --}}
                                <button type="submit" class="btn btn-primary" type="submit"><span
                                        class="fa fa-search"></span></button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div>
            <div class="alert-option">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                </div>
            </div>

            <div class="table-hover">
                <table class="table  table-primary">
                    <thead class="table bg-primary text-white">
                        <tr>
                            <th scope="col">Plat</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Merk</th>
                            <th scope="col">warna</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Harga Sewa per Hari</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($katalog as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->jenisKendaraan }}</td>
                                <td>{{ $data->merk }}</td>
                                <td>{{ $data->warna }}</td>
                                <td><img width="150px" height="100px" src="{{ asset('storage/' . $data->gambarKendaraan) }}">
                                </td>
                                <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                <td>{{ $data->catatan }}</td>
                                <td>
                                    <form action="{{ route('katalog.destroy', $data->id) }}" method="POST">
                                        <a class="btn btn-icons btn-primary"
                                            href="{{ route('katalog.show', $data->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-icons btn-warning"
                                            href="{{ route('katalog.edit', $data->id) }}"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                            data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
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
                            <p> Page : {!! $katalog->currentPage() !!} <br />
                                Jumlah Data : {!! $katalog->total() !!} <br />
                                Data Per Halaman : {!! $katalog->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $katalog->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

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
        $('#katalog').addClass('active');
    </script>
@endsection
