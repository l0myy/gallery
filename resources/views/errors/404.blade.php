@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="card">
        <h2 class="card-header">Oops...</h2>
        <img src="{{ asset('img/404.jpg') }}">
    </div>
    <a href="/" class="btn btn-outline-primary">Back to home</a>
    </div>

@endsection