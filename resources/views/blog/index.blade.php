@extends('blog.layout')
@section('content')

@foreach($posts as $post)
<a href="post/{{ $post->id }}">
    <h2>{{ $post->post_title }}</h2>
</a>
<span>{{ $post->created_at }}</span> <span>~ by Herosimo Sribiko</span>
<br><br>
{{$post->post_text}}
<hr><br>
@endforeach

@endsection('content')