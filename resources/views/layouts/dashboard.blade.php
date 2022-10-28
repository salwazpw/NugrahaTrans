<?php
use Carbon\Carbon;

$date = Carbon::now()->isoFormat('dddd, D MMMM Y');

$koneksi = mysqli_connect('localhost', 'root', '', 'pwl_project');

$query1 = mysqli_query($koneksi, 'SELECT * FROM pengunjungs');
$query2 = mysqli_query($koneksi, 'SELECT * FROM kamars');
$query3 = mysqli_query($koneksi, 'SELECT * FROM makanans');
$query4 = mysqli_query($koneksi, 'SELECT * FROM minumen');
$query5 = mysqli_query($koneksi, 'SELECT * FROM transaksis');
while ($a = mysqli_fetch_array($query5)) {
    $jumlahkan = 'SELECT SUM(total_harga) AS jumlah_total FROM transaksis';
    $hasil = mysqli_query($koneksi, $jumlahkan);
    $t = mysqli_fetch_array($hasil);
}
$query6 = mysqli_query($koneksi, 'SELECT * FROM pesanans');
while ($b = mysqli_fetch_array($query6)) {
    $jumlahkan = 'SELECT SUM(total_harga) AS jumlah_total FROM pesanans';
    $hasil = mysqli_query($koneksi, $jumlahkan);
    $p = mysqli_fetch_array($hasil);
}
$jml_pengunjung = mysqli_num_rows($query1);
$jml_kamar = mysqli_num_rows($query2);
$jml_makanan = mysqli_num_rows($query3);
$jml_minuman = mysqli_num_rows($query4);
?>
@extends('layouts.main')
@section('title')
    Dashboard | QUEEN Z
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome To Our Hotel
                    {{ auth()->user()->name }} !</h3>
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
            <!-- ********************* -->
            <!-- Start First Cards -->
            <!-- ********************* -->
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($jml_pengunjung, 0, ',', '.'); ?></h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pengunjung</h6>
                            </div>

                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <p style="color: rgb(255,79,112)">
                                    <span class=" fas fa-users fa-2x"></i></span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php echo number_format($jml_kamar, 0, ',', '.'); ?></h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kamar
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <p style="color: rgb(1,202,241)">
                                    <span class="fas fa-bed fa-2x"></i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($jml_makanan, 0, ',', '.'); ?></h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Menu Makanan</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span><i class=" fas fa-utensils fa-2x " style='color:rgb(34,202, 126)'></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($jml_minuman, 0, ',', '.'); ?></h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Menu Minuman</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class=" fas fa-coffee fa-2x " style='color:rgb(95,118, 232)'></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ********************* -->
            <!-- End First Cards -->
            <!-- ********************* -->
            <!-- ********************* -->
            <!-- Start Sales Charts Section -->
            <!-- ********************* -->
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Income</h4>
                            <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                            @if (auth()->user()->level == 'admin')
                            <ul class="list-style-none mb-0">
                                <li>
                                    <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                    <span class="text-muted">Total Transaksi</span>
                                    <span class="text-dark float-right font-weight-medium">Rp. <?php echo number_format($t['jumlah_total']); ?></span>
                                </li>
                                <li class="mt-3">
                                    <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                    <span class="text-muted">Total Pesanan</span>
                                    <span class="text-dark float-right font-weight-medium">Rp. <?php echo number_format($p['jumlah_total']); ?></span>
                                </li>
                                <li class="mt-3">
                                    <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                    <span class="text-muted">Lain-lain</span>
                                    <span class="text-dark float-right font-weight-medium"></span>
                                </li>
                            </ul>
                            @else
                            <ul class="list-style-none mb-0">
                                <li>
                                    <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                    <span class="text-muted">Total Transaksi</span>
                                </li>
                                <li class="mt-3">
                                    <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                    <span class="text-muted">Total Pesanan</span>
                                </li>
                                <li class="mt-3">
                                    <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                    <span class="text-muted">Lain-lain</span>
                                    <span class="text-dark float-right font-weight-medium"></span>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Facilities</h4>
                            <div style="height:300px;">
                                <br>
                                <div>
                                    <i class="fas fa-utensils"></i><span class="hide-menu"> &nbsp &nbsp Restaurant</span>
                                    </li>
                                </div>
                                <div>
                                    <i class="fas fa-wine-glass"></i><span class="hide-menu"> &nbsp &nbsp &nbspBar</span>
                                    </li>
                                </div>
                                <div>
                                    <i class="fas fa-leaf"></i><span class="hide-menu"> &nbsp &nbspSwimming Pool</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-hand-rock"></i><span class="hide-menu"> &nbsp &nbspFitness
                                        Center</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-car"></i><span class="hide-menu"> &nbsp &nbspParking Area</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-warehouse"></i><span class="hide-menu"> &nbsp Ballroom</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-university"></i><span class="hide-menu"> &nbsp &nbspMeeting Room</span>
                                    </li>
                                </div>
                                <div>
                                    <i class="fas fa-smoking"></i><span class="hide-menu"> &nbsp Smooking Area</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-wifi"></i><span class="hide-menu"> &nbsp Free Wi-Fi</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-utensil-spoon"></i><span class="hide-menu"> &nbsp &nbspFree
                                        Breakfast</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-phone-volume"></i><span class="hide-menu"> &nbsp &nbsp 24-hour
                                        Reception Service</span></li>
                                </div>
                                <div>
                                    <i class="fas fa-bath"></i><span class="hide-menu"> &nbsp &nbspBeauty Salon/Spa</span>
                                    </li>
                                </div>
                                <div>
                                    <i class="fas fa-taxi"></i><span class="hide-menu"> &nbsp &nbspFree pick up</span></li>
                                </div>
                            </div>
                            <ul class="list-inline text-center mt-5 mb-2">
                                <li class="list-inline-item text-muted font-italic">Facilities in this hotel</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Location</h4><br><br><br>
                            <div class="" style="height:230px">
                                <img src="{{ asset('templatee/assets/images/map.png') }}" width="300px"
                                    height="166px">
                            </div>
                            <ul class="list-inline text-center mt-5 mb-2">
                                <li class="list-inline-item text-muted font-italic">Location of Queen Z Hotel</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Sales Charts Section -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Fitness Center</h4>
                                <div id="campaign-v2" class="mt-2" style="height: 380px; width:100%;">
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/fitnesscenter1.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                    <br>
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/fitnesscenter2.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Swimming Pool</h4>
                                <div style="height:380px;">
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/pool1.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                    <br>
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/pool2.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Restaurant</h4>
                                <div style="height:380px">
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/restaurant1.jpg') }}"
                                            style="border-color: rgb(255, 250, 250); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                    <br>
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/restaurant2.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bar</h4>
                                <div id="campaign-v2" class="mt-2" style="height: 380px; width:100%;">
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/bar1.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                    <br>
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/bar2.jpg') }}"
                                            style="border-color: rgb(255, 253, 253); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ballroom</h4>
                                <div style="height:380px;">
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/ballroom1.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                    <br>
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/ballroom2.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Beauty Salon/Spa</h4>
                                <div style="height:380px">
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/spa1.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                    <br>
                                    <div align="center">
                                        <img src="{{ asset('templatee/assets/images/spa2.jpg') }}"
                                            style="border-color: rgb(255, 255, 255); border-style: solid; border-radius:10px;"
                                            width="250px" height="166px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
        @endsection
