@extends('blog.layout')
@section('content')

@foreach($posts as $post)
<h2>{{ $post->post_title }}</h2>
<span>{{ $post->created_at }}</span> <span>~ by Herosimo Sribiko</span>
<br><br>
{{$post->post_text}}
<hr><br>
@endforeach

@endsection('content')