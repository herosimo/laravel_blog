@extends('admin/layout')
@section('title', 'Admin Page > Post > Edit')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Post</h1>
<form action="/admin/post/{{ $post->id }}" method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" value="{{ $post->post_title }}">
    </div>
    <div class="form-group">
        <label for="post_text">Post Content</label>
        <textarea class="form-control" id="post_text" name="post_text" rows="10">{{ $post->post_text }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection('content')