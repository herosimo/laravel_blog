@extends('admin/layout')
@section('title', 'Admin Page > Media')
@section('content')

<!-- Page Heading -->
@section('heading', 'Media')

<div class="container">
    <div class="row">
        <div class="col-sm d-flex align-items-center">
            <p>Files Gallery.</p>
        </div>
        <div class="col-sm d-flex justify-content-end align-items-center">
            <p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    Upload File
                </button>
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

<div class="container">
    <div class="row">
        @foreach($images as $image)
        <div class="col-sm-3 mb-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ Storage::url($image) }}">
                <div class="card-body">
                    <form class="form" action="/admin/media" method="post">
                        @method('DELETE')
                        @csrf
                        <h5 class="card-title">{{ $names[$loop->index] }}</h5>

                        <input type="hidden" name="file" value="{{ $image }}">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<form action="/admin/media" method="post" enctype="multipart/form-data">
    @csrf

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Browse your image before upload.
                    <div class="input-group mb-3 mt-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="images[]" id="images" multiple>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection('content')