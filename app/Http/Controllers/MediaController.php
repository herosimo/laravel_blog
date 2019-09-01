<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = Storage::disk('public')->files('media');

        foreach ($images as $image) {
            $data = explode('/', $image);
            $names[] = $data[1];
        }

        return view('/admin/media/index', compact('images', 'names'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'images.*' => 'file|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);

        $images = $request->file('images');

        foreach ($images as $image) {
            // upload file on server
            $fileName = $image->getClientOriginalName();
            Storage::disk('public')->putFileAs('media', $image, $fileName);
        }

        Session::flash('success', 'Your files have been saved');
        return redirect('/admin/media');
    }

    public function destroy(Request $request)
    {
        // dd($request->file);
        $file = $request->file;
        Storage::disk('public')->delete($file);
        return redirect('/admin/media');
    }
}
