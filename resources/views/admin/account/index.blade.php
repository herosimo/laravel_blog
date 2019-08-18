@extends('admin/layout')
@section('title', 'Admin Page > Account')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Account</h1>
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