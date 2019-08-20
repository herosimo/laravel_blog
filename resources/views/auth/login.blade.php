@extends('auth/layout')
@section('title', 'Login Page')
@section('content')

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">

            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>

                <form class="user" method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>

                <br>

                @if (Route::has('password.request'))
                <div class="text-center">
                  <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
                @endif

                @if (Route::has('register'))
                <div class="text-center">
                  <a class="small" href="{{ route('register') }}">Create an Account!</a>
                </div>
                @endif

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

@endsection('content')