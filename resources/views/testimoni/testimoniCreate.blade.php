@extends('layouts.main')
@section('title')
Tambah Data Testimoni | Nugraha Trans
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Tambah Data Testimoni</h5>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    <div class="col-sm-12 col-md-8" style="margin-left: 150px; margin-top: 30px" >
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Give Your Testimoni!</h4>
                <h6 class="card-subtitle">Add your name (can be disguised) and also your testimonial</h6>
                <form class="mt-2" method="POST" enctype="multipart/form-data" action="{{route('testimoni.store')}}">
                @csrf    
                <div class="form-group">
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Name" aria-describedby="emailHelp" name="nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Testimoni" aria-describedby="emailHelp" name="testimoni" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Rating <i class="fa fa-star"></i></label>
                        <br>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rate" id="1" value="1"> 1
                                </label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rate" id="2" value="2"> 2
                                </label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rate" id="3" value="3"> 3
                                </label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rate" id="4" value="4"> 4
                                </label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rate" id="5" value="5"> 5
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('testimoni.index')}}">Cancel</a>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection