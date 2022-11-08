@extends('layouts.main')
@section('title')
Testimoni | Nugraha Trans
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimoni</h1><br>
                    <h3> <a class="btn btn-success" href="{{ route('testimoni.create') }}">+ Tambah Data</a></h3>
                </div><!-- /.col -->
                <div class="col-md-6"><br><br><br>
                    <div class="float-right">
                        <form class="form-inline my-23 my-lg-0" action="{{ url()->current() }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{ request('keyword') }}">
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
                    <p>{{ $message }}</p>
                </div>
                @endif

            </div>
        </div>

        <div class="table-hover">
            <table class="table  table-primary" style="width: 600px" , align="center">
                <thead class="table bg-primary text-white">
                    <tr>
                        <th scope="col">Data Testimoni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimoni as $data)
                    <tr>
                        <td>Nama : {{ $data->nama }} <br><br>
                            Rating :
                            @if ($data->rate == 1)
                                <i class="fa fa-star"></i>
                            @elseif ($data->rate == 2)
                                <i class="fa fa-star"></i><i class="fa fa-star"></i>
                            @elseif ($data->rate == 3)
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            @elseif ($data->rate == 4)
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            @elseif ($data->rate == 5)
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            @endif <br><br>
                            Testimoni : <br>{{ $data->testimoni }} 
                            </td>
                    </tr>

                    <!-- {{-- <td>Alamat: {{ $data->alamat }}</td>
                                <td>No. Telepon: {{ $data->telepon }}</td>
                                <td>Aksi:
                                    <form action="{{ route('customer.destroy', $data->id) }}" method="POST">
                                        <a class="btn btn-icons btn-primary"
                                            href="{{ route('customer.show', $data->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-icons btn-warning"
                                            href="{{ route('customer.edit', $data->id) }}"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                            data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr> --}} -->
                    @endforeach
                </tbody>
            </table>


            <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p> Page : {!! $testimoni->currentPage() !!} <br />
                                Jumlah Data : {!! $testimoni->total() !!} <br />
                                Data Per Halaman : {!! $testimoni->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $testimoni->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm-12 col-md-6 col-lg-4" width="800" height="450" style="margin-left: 435px" method="POST" enctype="multipart/form-data" action="{{route('testimoni.store')}}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Give Your Testimoni!</h4>
                    <h6 class="card-subtitle">Add attribute <code>value="VALUE"</code> to set predefined
                        value.</h6>
                    <form class="mt-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" aria-describedby="emailHelp" name="nama" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Testimoni" aria-describedby="emailHelp" name="testimoni" required>
                        </div>
                    </form>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>        
        </div> -->
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
    $('#testimoni').addClass('active');
</script>
@endsection