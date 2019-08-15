@extends('admin/layout')
@section('title', 'Admin Page > Post')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Post</h1>
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
                        <a href="/admin/post/{{ $post->id }}/edit">
                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                        </a>
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection('content')