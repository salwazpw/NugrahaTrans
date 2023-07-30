@extends('layouts.main')
@section('title')
    Carousel Katalog Kendaraan | Nugraha Trans
@endsection
<!DOCTYPE html>
<html>
<head>
  <title>Carousel Example</title>
  <!-- Load Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    .carousel-inner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>
@section('content')
{{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach ($products as $item)
        <div class="item {{$item['id']==1?'active':''}}">
            <img src="{{$item['gambarKendaraan']}}">
            <div class="carousel-caption">
              <h3>{{$item['merk']}}</h3>
            </div>
          </div>

          @endforeach
    </div>
  
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> --}}

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @php $i = 0; @endphp
      @foreach ($products as $slideritem)
        <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
        @php $i++; @endphp
      @endforeach
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      @php $i = 0; @endphp
      @foreach ($products as $slideritem)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
          <img src="{{ asset('storage/' . $slideritem->gambarKendaraan) }}" class="d-block w-100 img-fluid">
          <div class="carousel-caption d-none d-md-block">
            <h3>{{ $slideritem->merk }}</h3>
          </div>
        </div>
        @php $i++; @endphp
      @endforeach
    </div>
  
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
@endsection