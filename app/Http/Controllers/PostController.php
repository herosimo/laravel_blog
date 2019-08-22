<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('/admin/post/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'required',
            'post_text' => 'required'
        ]);

        $post = new Post;
        $post->post_title = $request->post_title;
        $post->post_text = $request->post_text;
        $post->slug = str_replace(' ', '-', strtolower($request->post_title));
        $post->archived = $request->archived;
        $post->user_id = $request->user_id;
        $post->save();

        Session::flash('success', 'You have successfully make a new post');
        return redirect('/admin/post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('/admin/post/edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_title' => 'required',
            'post_text' => 'required'
        ]);

        $post = Post::find($id);
        $post->post_title = $request->post_title;
        $post->post_text = $request->post_text;
        $post->slug = str_replace(' ', '-', strtolower($request->post_title));
        $post->save();

        Session::flash('edit', 'Successfully edit post');
        return redirect('/admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('delete', 'Post has been deleted');
        return redirect('/admin/post');
    }
}
