<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('archived', '0')
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        return view('/blog/index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('/blog/show', compact('post'));
    }

    public function archives()
    {
        $posts = Post::all();
        return view('/blog/archives', compact('posts'));
    }

    public function comments()
    {
        $comments = Comment::all();
        return view('blog/comments', compact('comments'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $posts = Post::where('post_title', 'like', '%' . $search . '%')
            ->orWhere('post_text', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        $posts->appends($request->only('search'));

        return view('/blog/index', compact('posts', 'search'));
    }
}
