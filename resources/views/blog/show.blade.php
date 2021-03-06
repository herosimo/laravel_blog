@extends('blog.layout')
@section('title', $post->post_title)
@section('content')

<h1 class="mb-4">{{ $post->post_title }}</h1>
<div class="media mb-4">
    <img class="img-profile rounded-circle mr-3" src="{{ url('/assets/photoPic/'.$post->user->photoProfile) }}" alt="User Pic">
    <div class="media-body">
        <h5 class="mt-0 mb-0">{{ $post->user->name }}</h5>
        {{ $post->created_at->toFormattedDateString() }}
    </div>
</div>

<div>
    {!! $post->post_text !!}
</div>

<hr>

@if ($message = session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

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

<h4>{{ $post->comments->count() }} Comments</h4>

@foreach($post->comments as $comment)
<h5>{{ $comment->commenter_name }}</h5>
<p>
    {{ $comment->comment }}
</p>
@endforeach

<hr>

<h4>Add Comment</h4>
<form method="POST" action="/admin/comment">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $post->id }}">
    <div class="form-group">
        <label for="name">Your name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" required>
    </div>
    <div class="form-group">
        <label for="comment">Your comment here</label>
        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection('content')