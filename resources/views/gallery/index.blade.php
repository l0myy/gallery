@extends('layouts.app')

@section('content')


    <div class="row">
    @foreach($newAlbums as $album)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>{{$album}}</h3>
                </div>
                <div class="card-body">
                    <div class="card-img" style="background-image: url({{Storage::exists('public/' . $album . '.jpg') ? asset(Storage::url('public/' . $album . '.jpg')) : asset('img/def-album.jpg')}})"></div>
                    <div class="row">
                    <div class="col-5">
                    <a href="{{ route('gallery.show',['albumName'=>$album]) }}" class="btn btn-outline-success" >Show album</a>
                    </div>

                    <div class="col-5">
                    <form action="{{route('gallery.destroy')}}" method="POST" onsubmit="if(confirm('Are you sure?'))
                                        {return true} else {return false}">
                        @csrf
                        <button type="submit" value="{{$album}}" name="dirName" class="btn btn-outline-danger" >Delete album
                        </button>
                    </form>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

    <script src="{{asset('js/app.js')}}"></script>

@endsection