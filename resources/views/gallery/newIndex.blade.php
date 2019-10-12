@extends('layouts.app')

@section('content')

    <h2> Please, enter an odd number</h2>
    <div class="container">
        <form class="form" method="post" action="{{route('gallery.triangle')}}"  enctype="multipart/form-data" >
            @csrf
            <input class="form-control-sm" type="text"  name = "var" placeholder="3,5,7..." aria-label="var">
            <button class="btn btn-outline-success" type="submit">Confirm</button>
        </form>
    </div>

    @yield('triangle')

@endsection

