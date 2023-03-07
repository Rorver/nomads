@extends('layout.checkout')

@section('content')

<main class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-6">
                    <h1 class="mb-4">We explore the new <br> life much better</h1>
                    <img src="FrontEnd/images/galleryPhoto.jpg" class="w-75 d-none d-sm-flex" alt="">
                </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="FrontEnd/images/logo_nomads.png" class="w-50 mb-4" alt="">
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3 text-start">
                                  <label for="email" class="form-label ms-3">Email address</label>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mb-3 text-start">
                                  <label for="password" class="form-label ms-3">Password</label>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mb-3 form-check text-start">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="d-grid gap-2 mx-auto">
                                    <button type="submit" class="btn btn-login rounded-1">Sign In</button>
                                </div>

                                @if (Route::has('password.request'))
                                    <p class="text-center mt-3">
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Saya Lupa Password') }}
                                        </a>
                                @endif
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
