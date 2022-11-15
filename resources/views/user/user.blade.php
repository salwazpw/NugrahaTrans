@extends('layouts.main')
@section('title')
Data User | NugrahaTrans
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data User</h1><br>
                </div>
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
                        <th scope="col">KTP</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $data)
                    <tr>
                        <td><img src="{{asset('storage/'.$data->foto)}}" alt="foto" width="50px" height="50px"
                            class="border-0"></td>
                        <td>{{$data->nik}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->no_hp}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->jenis_kelamin}}</td>
                        <td>{{$data->tanggal_lahir}}</td>
                        <td>
                            <form action="{{ route('user.destroy',  $data->nik) }}" method="POST">
                                <a class="btn btn-icons btn-primary" href="{{route('user.show', $data->nik)}}"><i class="fa fa-eye"></i></a> 
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
                        <p>Page : {!! $user->currentPage() !!} <br />
                            Jumlah Data : {!! $user->total() !!} <br />
                            Data Per Halaman : {!! $user->perPage() !!} <br />
                        </p>
                    </div>
                    <div class="mx-auto">
                        <div class="paginate-button col-md-12">
                            {{ $user->links() }}
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
    $('#user').addClass('active');
</script>
@endsection