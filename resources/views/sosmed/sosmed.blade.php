@extends('layouts.main')
@section('title')
Testimoni | NugrahaTrans
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <!-- Row -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('templatee/assets/images/whatsapp.png')}}"
                        alt="Card image cap" style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">WhatsApp</h4>
                        <p class="card-text">Hubungi Kami jika ada pertanyaan yang ingin diajukan melalui WhatsApp</p>
                        <a href="https://wa.me/6281234141643" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('templatee/assets/images/instagram.png')}}"
                        alt="Card image cap" style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Instagram</h4>
                        <p class="card-text">Kunjungi Instagram Kami untuk Informasi Tambahan Lainnya</p>
                        <a href="https://instagram.com/nugrahacorp.inc" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('templatee/assets/images/facebook.png')}}"
                        alt="Card image cap" style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Facebook</h4>
                        <p class="card-text">Kunjungi Facebook Kami untuk Informasi Tambahan Lainnya</p>
                        <a href="https://www.facebook.com/nugrahatrans.id" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-3 col-md-6 img-fluid">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('templatee/assets/images/email.png')}}"
                        alt="Card image cap" style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">G-Mail</h4>
                        <p class="card-text">Hubungi Kami jika ada pertanyaan yang ingin diajukan melalui G-Mail</p>
                        <a href="mailto:nugrahacorp.inc@gmail.com" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
        </div>
        <!-- Row -->
    </div>
</div>
@endsection