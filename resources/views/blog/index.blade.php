@extends('blog.layout')
@section('content')

@foreach($posts as $post)
<a href="post/{{ $post->slug }}">
    <h1>{{ $post->post_title }}</h1>
</a>
<span>{{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}</span>
<br><br>
{!! $post->post_text !!}
<hr><br>
@endforeach

{{ $posts->links() }}

@endsection('content')