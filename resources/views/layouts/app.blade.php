<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <nav class="container navbar navbar-expand (-sm | -md | -lg | -xl)) navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('gallery.index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('gallery.create')}}" data-toggle="modal" data-target=".crt-alb">Create album <span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<main role="main" class="container">

        @if(Session::has('message'))
            <div class="alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert-danger">
                {{Session::get('error')}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            @yield('content')
        </div>
</main>

<div class="modal fade crt-alb" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h2 id="my-h2">Enter name for new directory</h2>
            <div class="container">
                <form action="{{route('gallery.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="albumName" type="text" class="form-control"
                           placeholder="Enter album name ">
                    <br>
                    <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
