@extends('admin/layout')
@section('title', 'Admin Page > Post > Add')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Post</h1>
<form method="POST" action="/admin/post">
    @csrf
    <div class="form-group">
        <!-- <input type="hidden" id="deleted" name="deleted" value=22> -->
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Add Title">
        <input type="hidden" id="archived" name="archived" value="0" />
    </div>
    <div class="form-group">
        <label for="post_text">Post Content</label>
        <textarea class="form-control" id="post_text" name="post_text" rows="10" placeholder="Add Content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Publish</button>
</form>

@endsection('content')