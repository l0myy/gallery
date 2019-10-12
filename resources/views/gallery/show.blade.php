@extends('layouts.app')

@section('content')

    <h2>{{$album}}</h2>
    <div class="row">

    @foreach($images as $image)
        <div class="col-md-4">
            <img class = "img-thumbnail" src="{{asset(Storage::url($image))}}">
            <form action="{{route('gallery.destroy')}}" method="POST" onsubmit="if(confirm('Are you sure?'))
                                        {return true} else {return false}">
                @csrf
                <button type="submit" value="{{$image}}" name="imgName" class="btn btn-1 btn-outline-danger" >Delete image
                </button>
            </form>
        </div>
    @endforeach
</div>

    <div class="row">
        <div class="col-2">
            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target=".chg-cvr">Change сover</button>
        </div>
        <div class="col-2">
                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target=".ld-file">Load new image</button>
        </div>
        <div class="col-2">
            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target=".edt-alb">Edit album name</button>
        </div>
        <div class="col-2">
            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target=".edt-alb">Delete file</button>
        </div>
    </div>

    <div class="modal fade chg-cvr" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <h2 id="my-h2">Choose image for Cover</h2>
                    <form action="{{route('gallery.load')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="newFile" class="form-control-file">
                        <input type="hidden" value="{{$album}}" name="albumName">
                        <input type="hidden" value="1" name="id">
                        <br>
                        <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade ld-file" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <h2 id="my-h2">Choose new image for album</h2>
                    <form action="{{route('gallery.load')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="newFile" class="form-control-file">
                        <input type="hidden" value="{{$album}}" name="albumName">
                        <br>
                        <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade edt-alb" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <h2 id="my-h2">Choose new album name</h2>
                    <form action="{{route('gallery.edit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="newAlbumName" class="form-control-file">
                        <input type="hidden" value="{{$album}}" name="albumName">
                        <br>
                        <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>



@endsection