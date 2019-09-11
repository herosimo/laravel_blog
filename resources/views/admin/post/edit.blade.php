@extends('admin/layout')
@section('title', 'Admin Page > Post > Edit')
@section('content')


<!-- Page Heading -->
@section('heading', 'Edit Post')
<form action="/admin/post/{{ $post->id }}" method="post">
    @csrf
    @method('PATCH')

    @if( $errors->any() )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        {{$error}} <br>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" value="{{ $post->post_title }}" required>
    </div>
    <div class="form-group">
        <label for="post_text">Post Content</label>
        <textarea class="form-control" id="editor" name="post_text" rows="10" required>{{ $post->post_text }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

<script>
    ClassicEditor
    .create(document.querySelector('#editor'), {
            mediaEmbed: { previewsInData: true }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection('content')