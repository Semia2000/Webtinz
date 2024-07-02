@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="signup flex-column d-flex justify-content-center align-items-center">
        @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
        <div class="text-center mt-4  mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="row row-cols-1 row-cols-md-2">

            <div class="col signuptext" style="background-color: white;">
                <div class="p-4">
                    <center>
                        <h2>{{ __('Admin Login') }}</h2>
                    </center>
                    <p></p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mt-3 form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-check mb-2 mt-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-info btn-block"
                                style="width: 100%; border:1px solid #F05940"> {{ __('Login') }}</button>
                        </div>
                        <br>
                        <div>
                            @if (Route::has('password.request'))
                                <a style="color:#4E4E4E ; text-decoration:none" class="btn btn-link"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
