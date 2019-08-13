@extends('blog/layout')

@section('title', 'Laravel Blog > Comment Pages')
@section('message', 'Comment Pages')
@section('message_note', 'Read all thoughts from everyone here.')

@section('content')
<h2>Comment Section</h2>
<ul>
    @foreach($comments as $comment)
    <a href="/post/{{ $comment->post->id }}">
        <li>{{ $comment->comment }} by {{ $comment->commenter_name }}, on {{ $comment->post->post_title }}</li>
    </a>
    @endforeach
</ul>
@endsection('content')