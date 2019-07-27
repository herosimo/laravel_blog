@extends('admin/layout')
@section('title', 'Admin Page > Change Password')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Change Password</h1>
<form>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password-Repeat</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password-Repeat">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Change</button>

</form>

@endsection('content')