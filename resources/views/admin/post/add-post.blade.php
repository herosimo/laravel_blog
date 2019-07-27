@extends('admin/layout')
@section('title', 'Admin Page > Post > Add')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Post</h1>
<form>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" id="content" name="content" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Publish</button>
</form>

@endsection('content')