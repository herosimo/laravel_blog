@extends('blog.layout')
@section('content')

@foreach($posts as $post)
<a href="post/{{ $post->slug }}">
    <h2>{{ $post->post_title }}</h2>
</a>
<span>{{ $post->created_at }}</span> <span>~ by {{ $post->user->name }}</span>
<br><br>
{{$post->post_text}}
<hr><br>
@endforeach

{{ $posts->links() }}

@endsection('content')