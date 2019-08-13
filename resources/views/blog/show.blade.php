@extends('blog.layout')
@section('title', '{{ $post->post_title }}')
@section('content')

<h1>{{ $post->post_title }}</h1>
<p class="text-secondary">Posted by Herosimo Sribiko, on 08/08/2019</p>

<p>
    {{ $post->post_text }}

</p>
<hr>

<h4>{{ $post->comments->count() }} Comments</h4>

@foreach($post->comments as $comment)
<h6>{{ $comment->commenter_name }}</h6>
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
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="comment">Your comment here</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection('content')