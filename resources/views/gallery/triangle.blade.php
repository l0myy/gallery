@extends('gallery.newIndex')

@section('triangle')


    @foreach($array as $arr)
        <h3>
            {{$arr}}
        </h3>
    @endforeach


@endsection

