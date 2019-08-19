@extends('admin/layout')
@section('title', 'Admin Page > Profile')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Profile</h1>
<p>Update your profile.</p>

<form method="post" action="/admin/account/profile">
    @csrf
    @method('PATCH')

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

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->email }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Your Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Change</button>
</form>

@endsection('content')