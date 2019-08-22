@extends('admin/layout')
@section('title', 'Admin Page > Post > Add')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Post</h1>
<form method="POST" action="/admin/post">
    @csrf

    @if( $errors->any() )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        {{$error}} <br>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="form-group">
        <input type="hidden" id="archived" name="archived" value=0 />
        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Add Title" required>
    </div>
    <div class="form-group">
        <label for="post_text">Post Content</label>
        <textarea class="form-control" id="post_text" name="post_text" rows="10" placeholder="Add Content" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Publish</button>
</form>

@endsection('content')