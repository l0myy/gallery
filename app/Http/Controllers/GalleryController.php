<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $newAlbums = array();
       $albums = Storage::directories('public');
       foreach ($albums as $album)
       {
           array_push($newAlbums, str_replace('public/', '', $album));
       }

        return view('gallery.index',compact('newAlbums'));
    }

    public function load(Request $request)
    {
        $this->validate($request,[
            'albumName'=>'required',
            'newFile'=>'required|mimes:jpeg,png,jpg|max:5000'
        ]);

        if(!$request->id) {
            $newFileName = str_replace(' ', '-', $request->file('newFile')->getClientOriginalName());
            $newPath = 'public/' . $request->albumName;

            if (Storage::exists($newPath . '/' . $newFileName)) {
                return redirect()->back()->with('error', 'File already exists in this directory.');
            } else {
                $path = $request->file('newFile')->storeAs($newPath, $newFileName);
                return redirect()->back()->with('message', 'Image loaded successfully!');
            }
        }
        else
        {
            $newFileName = $request->albumName . '.jpg' ;
            $newPath = 'public/';

                $path = $request->file('newFile')->storeAs($newPath, $newFileName);
                return redirect()->back()->with('message', 'Image loaded successfully!');
        }

    }

    public function show($album)
    {
        $images = Storage::files('public/' . $album);

        return view('gallery.show',compact('images','album'));

    }

    public function destroy(Request $request)
    {
        $this->validate($request,[
            'imgName'=>'required',
            'dirNAme'=>'required'
        ]);

        if ($request -> dirName) {
            $dirName = 'public/' . $request->dirName;

            Storage::deleteDirectory($dirName);

            if (Storage::exists($dirName)) {
                return back()->withErrors('Something gone wrong!');
            }
            return back()->with('message', 'Album successfully deleted!');
        }
        else{

            Storage::delete($request->imgName);
            if (Storage::exists($request->imgName)) {
                return back()->withErrors('Something gone wrong!');
            }
            return back()->with('message', 'Image successfully deleted!');

        }
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'albumName'=>'required',

        ]);

        $albumName = str_replace(' ', '-', $request->albumName);

        Storage::makeDirectory('public/' . $albumName);

        return back()->with('message', 'Album created successfully!');
    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'newAlbumName'=>'required',
            'albumName'=>'required'

        ]);

        $newAlbumName = 'public/' . $request->newAlbumName;

        $newAlbumName = str_replace(' ', '-', $newAlbumName);

        $albumName = 'public/' . $request->albumName;

        #Storage::makeDirectory('public/' . $albumName);
        Storage::move($albumName,$newAlbumName);
        if(Storage::exists($albumName . '.jpg' ))
        {
            Storage::move($albumName . '.jpg',$newAlbumName . '.jpg');
        }

        return redirect()->route('gallery.show',$request->newAlbumName)->with('message', 'Album created successfully!');
    }

}
