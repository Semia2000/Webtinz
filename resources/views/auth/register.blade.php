@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')

    <section class="signup flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-4  mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="row row-cols-1 row-cols-md-2">

            <div class="col signuptext" style="background-color: white;">
                <div class="p-4">
                    <h2>{{ __('Register') }}</h2>
                    <p>Continue to Webtinz</p>
                    <div>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mt-3 form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="email">
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
                                <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>

                        </div>


                        <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block" style="width: 100%; border:1px solid #F05940">
                                    {{ __('Register') }}
                                </button>
                        </div>
                        <br>
                        <p class="divider-text text-center">
                            <span>&nbsp;&nbsp; or &nbsp;&nbsp;</span>
                        </p>
                        <br>
                        <div class="form-group">
                            <a href="{{ route('otpverif') }}"
                                class="btn whatsapp-btn btn-block" style="width: 100%;"> <img
                                    src="{{ asset('assets/images/icons/google_2504739.png') }}" width="20"
                                    height="20" alt=""> &nbsp;&nbsp; Login with Gmail</a>
                        </div> <!-- form-group// -->
                        <br>
                    </form>
                </div>
            </div>
            <div class="col signupimg d-flex justify-content-center align-items-center" style="background-color: #FFF6EC;">
                <img src="{{ asset('assets/images/web-designer-working-on-web-ui.png') }}" alt=""
                    style="max-width: 100%; max-height: 100%;">
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
















{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
