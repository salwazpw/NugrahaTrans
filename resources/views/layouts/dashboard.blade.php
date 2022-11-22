<?php

use Carbon\Carbon;

$date = Carbon::now()->isoFormat('dddd, D MMMM Y');

$koneksi = mysqli_connect('localhost', 'root', '', 'nugrahatrans');

$query1 = mysqli_query($koneksi, 'SELECT * FROM katalogs');
$jml_katalog = mysqli_num_rows($query1);

$query2 = mysqli_query($koneksi, 'SELECT * FROM users');
$jml_user = mysqli_num_rows($query2);

$query3 = mysqli_query($koneksi, 'SELECT * FROM pegawais');
$jml_pegawai = mysqli_num_rows($query3);


?>
@extends('layouts.main')
@section('title')
Dashboard | Nugraha Trans
@endsection
@section('content')
<div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome To Our Showroom
                        @if (Auth::check()) 
                            {{ auth()->user()->nama }} !</h3>
                         @else ()
                        , Anda belum Login
                        @endif
                        
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item">Dashboard</a>
                                </li>
                            </ol><br>
                        </nav>
                    </div>
                </div>
            </div>
    <div class="date">
        <p class="text-gray">
            <span class="weather-date"><?php echo $date; ?></span>
        </p>
    </div>
</div>
<div class="card">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($jml_katalog, 0, ',', '.'); ?></h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kendaraan</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <p style="color: rgb(255,79,112)">
                                <span class=" fas fa-car fa-2x"></i></span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php echo number_format($jml_user, 0, ',', '.'); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Customer</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <p style="color: rgb(1,202,241)">
                                <span class="fas fa-user fa-2x"></i></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($jml_pegawai, 0, ',', '.'); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pegawai</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class=" fas fa-users fa-2x " style='color:rgb(95,118, 232)'></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card" style="height:500px; width:1110px;">
                    <div class="card-body">
                        <style>
                            * {
                                box-sizing: border-box
                            }

                            body {
                                font-family: Verdana, sans-serif;
                                margin: 0
                            }

                            .mySlides {
                                display: none
                            }

                            img {
                                vertical-align: middle;
                            }

                            /* Slideshow container */
                            .slideshow-container {
                                max-width: 700px;
                                position: relative;
                                margin: auto;
                            }

                            /* Next & previous buttons */
                            .prev,
                            .next {
                                cursor: pointer;
                                position: absolute;
                                top: 50%;
                                width: auto;
                                padding: 16px;
                                margin-top: -22px;
                                color: white;
                                font-weight: bold;
                                font-size: 18px;
                                transition: 0.6s ease;
                                border-radius: 0 3px 3px 0;
                                user-select: none;
                            }

                            /* Position the "next button" to the right */
                            .next {
                                right: 0;
                                border-radius: 3px 0 0 3px;
                            }

                            /* On hover, add a black background color with a little bit see-through */
                            .prev:hover,
                            .next:hover {
                                background-color: rgba(0, 0, 0, 0.8);
                            }

                            /* Caption text */
                            .text {
                                color: #f2f2f2;
                                font-size: 15px;
                                padding: 8px 12px;
                                position: absolute;
                                bottom: 8px;
                                width: 100%;
                                text-align: center;
                            }

                            /* Number text (1/3 etc) */
                            .numbertext {
                                color: #494949;
                                font-size: 12px;
                                padding: 8px 12px;
                                position: absolute;
                                top: 0;
                            }

                            /* The dots/bullets/indicators */
                            .dot {
                                cursor: pointer;
                                height: 15px;
                                width: 15px;
                                margin: 0 2px;
                                background-color: #bbb;
                                border-radius: 50%;
                                display: inline-block;
                                transition: background-color 0.6s ease;
                            }

                            .active,
                            .dot:hover {
                                background-color: #717171;
                            }

                            /* Fading animation */
                            .fade {
                                -webkit-animation-name: fade;
                                -webkit-animation-duration: 100s;
                                animation-name: fade;
                                animation-duration: 10s;
                            }

                            @-webkit-keyframes fade {
                                from {
                                    opacity: .4
                                }

                                to {
                                    opacity: 1
                                }
                            }

                            @keyframes fade {
                                from {
                                    opacity: .4
                                }

                                to {
                                    opacity: 1
                                }
                            }

                            /* On smaller screens, decrease text size */
                            @media only screen and (max-width: 300px) {

                                .prev,
                                .next,
                                .text {
                                    font-size: 11px
                                }
                            }
                        </style>
                        </head>

                        <body>
                            {{-- <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome To Our Showroom
                        {{ auth()->user()->nama }} !</h3>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0">
                                        <li class="breadcrumb-item">Dashboard</a>
                                        </li>
                                    </ol><br>
                                </nav>
                            </div>
                    </div>
                </div> --}}

                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="{{ asset('templatee/assets/images/mobil1.jpeg') }}" style="width:80%; margin-left: 70px;">
                        <div class="text">Caption Text</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="{{ asset('templatee/assets/images/mobil2.jpeg') }}" style="width:80%; margin-left: 70px;">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="{{ asset('templatee/assets/images/mobil3.jpeg') }}" style="width:80%; margin-left: 70px;">
                        <div class="text">Caption Three</div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)"><</a>
                            <a class="next" onclick="plusSlides(1)">></a>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>

                <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("dot");
                        if (n > slides.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = slides.length
                        }
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " active";
                    }
                </script>

                </body>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection