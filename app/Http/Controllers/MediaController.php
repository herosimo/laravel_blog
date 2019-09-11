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

        return view('/admin/media/index', compact('images'));
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

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
