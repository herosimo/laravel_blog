@extends('auth/layout')
@section('title', 'Register Page')
@section('content')

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>

                <form class="user" method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="name" placeholder="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                    </div>

                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="password-confirm" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    @error('password')
                    <div class="col">
                      <p class="text-danger">{{ $message }}</p>
                    </div>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                  </button>

                </form>
                <br>

                @if (Route::has('password.request'))
                <div class="text-center">
                  <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
                @endif


                <div class="text-center">
                  <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

@endsection