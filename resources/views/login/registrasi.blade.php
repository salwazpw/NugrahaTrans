<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('templatee/assets/images/icon2.png') }}">
    <title>Registrasi - NugrahaTrans </title>
    <!-- Custom CSS -->
    <link href="{{ asset('templatee/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url({{ asset('templatee/assets/images/big/login2.jpg') }}) no-repeat center center;">
            <div class="auth-box row text-center">
                {{-- <div class="col-lg-10 col-md-7 modal-bg-img"
                    style="background-image: url({{ asset('templatee/assets/images/big/login.jpg') }});">
                </div> --}}
                <div class="col-lg-10 col-md-7 bg-white" style="margin-left:100px">
                    <div class="p-3">
                        <img src="{{ asset('templatee/assets/images/big/icon.png') }}" alt="wrapkit">
                        <h2 class="mt-3 text-center">Sign Up for Free</h2>
                        <form  method="POST" enctype="multipart/form-data" action="{{ route('postregistrasi') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="NIK"
                                            name="nik" id="nik">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="your name"
                                            name="nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="your username"
                                            name="username" id="username">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="email address"
                                            name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="password"
                                            name="password" id="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h6 align="left">Foto KTP
                                        <input class="form-control" type="file" name="foto" id="foto"></h6>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="number" placeholder="08xxxxx" name="no_hp"
                                            id="no_hp">
                                    </div>
                                    <div class="form-group">
                                        <h6 align="left">Tanggal Lahir
                                        <input class="form-control" type="date" placeholder="Tanggal Lahir" name="tanggal_lahir"
                                            id="tanggal_lahir"></h6>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Perumahan ..." name="alamat"
                                            id="alamat">
                                    </div>
                                
                                    <div class="form-group">
                                        <select
                                            class="form-control @error('jenis_kelamin') is-invalid
                                                @enderror"
                                            aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin"
                                            required>
                                            <option>Jenis Kelamin</option>
                                            <option value="P" @if (old('jenis_kelamin') == 'P') selected @endif>
                                                Perempuan
                                            </option>
                                            <option value="L" @if (old('jenis_kelamin') == 'L') selected @endif>
                                                Laki-Laki
                                            </option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-block btn-dark">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-12 text-center mt-5">Already have an account? <a href="{{ route('login') }}"
                                class="text-danger"> <br>Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('templatee/assets/libs/jquery/dist/jquery.min.js') }} "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('templatee/assets/libs/popper.js/dist/umd/popper.min.js') }} "></script>
    <script src="{{ asset('templatee/assets/libs/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>
