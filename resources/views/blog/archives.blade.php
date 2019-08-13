@extends('blog/layout')

@section('title', 'Laravel Blog > Archive Pages')
@section('message', 'Archive Pages')
@section('message_note', 'This is a place where all my posts listed.')

@section('content')
<h2>Archives</h2>

@foreach($posts as $post)
<ul>
    <a href="/post/{{ $post->id }}">
        <li>{{ $post->post_title }}</li>
    </a>
</ul>
@endforeach

@endsection('content')