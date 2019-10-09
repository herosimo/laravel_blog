@extends('admin/layout')
@section('title', 'Admin Page > Post')
@section('content')

<!-- Page Heading -->
@section('heading', 'Posts')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <p>Welcome to post insight.</p>
        </div>
        <div class="col-sm d-flex justify-content-end">
            <p>
                <a href="/admin/post/create"><button type="button" class="btn btn-outline-dark btn-sm">Create New Post</button></a>
            </p>
        </div>
    </div>
</div>

@if ($message = session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($message = session()->get('edit'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($message = session()->get('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<table class="table table-hover">
    <thead>
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Posted On</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $post->post_title }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
                <form class="form-inline" action="/admin/post/{{ $post->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="form-group mr-1">
                        <a href="/post/{{ $post->slug }}" target="_blank">
                            <button type="button" class="btn btn-warning btn-sm m-1">View</button>
                        </a>
                        <a href="/admin/post/{{ $post->id }}/edit">
                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                        </a>
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection('content')