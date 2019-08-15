@extends('admin/layout')
@section('title', 'Admin Page > Comment')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Comment</h1>
<p>Welcome to comment insight.</p>
<table class="table table-hover">
    <thead>
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Comment</th>
            <th scope="col">On</th>
            <th scope="col">Commenter</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $comment->comment }}</td>
            <td>{{ $comment->post->post_title }}</td>
            <td>{{ $comment->commenter_name }}</td>
            <td>
                <form class="form-inline" action="/admin/comment/{{ $comment->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection('content')