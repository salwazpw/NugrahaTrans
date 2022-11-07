@extends('layouts.main')
@section('title')
    Dashboard | Nugraha Trans
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
@endsection
