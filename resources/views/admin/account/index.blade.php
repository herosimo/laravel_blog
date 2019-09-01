@extends('admin/layout')
@section('title', 'Admin Page > Account')
@section('content')

<!-- Page Heading -->
@section('heading', 'Dashoard')
<p>
    Hello {{ Auth::user()->name }}
</p>
<p>
    Your account was created on {{ Auth::user()->created_at }}
</p>
<p>
    You have posted {{ Auth::user()->posts->count() }} posts
</p>

@endsection('content')