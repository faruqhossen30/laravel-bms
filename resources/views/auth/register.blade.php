@extends('layouts.frontend.master')
@section('title')
Welcome To {{ $bs->site_name }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">
        <a href="{{ route('index') }}">
        <button type="button" class="btn btn-outline-warning btn-lg btn-block">Back To Home Page</button>
        </a>
        </div>
    </div>
</div>
@endsection