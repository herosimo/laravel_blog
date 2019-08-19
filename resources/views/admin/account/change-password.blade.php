@extends('admin/layout')
@section('title', 'Admin Page > Change Password')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Change Password</h1>
<form action="/admin/account/change-password" method="post">
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

    @if ($message = session()->get('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
        <label for="currentPassword" class="col-sm-2 col-form-label">Current Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" aceholder="Password" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="newPassword_confirmation" class="col-sm-2 col-form-label">New Password-Repeat</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation" placeholder="New Password-Repeat" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Change</button>

</form>

@endsection('content')