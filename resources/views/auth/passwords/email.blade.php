@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="signup flex-column d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="text-center mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col signuptext " style="background-color: white;">
                <div class="text-left ">
                    <h2 class="mb-4">{{ __('Reset Password') }}</h2>
                    <div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mt-4 form-group input-group mb-2">
                            <label for="email">{{ __('Email Address') }}<span class="required">*</span></label>
                            <div class="input-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block"
                                style="width: 100%; border:1px solid #F05940">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col signupimg text-center" style="background-color: #FFF6EC;">
                <img src="{{ asset('assets/images/biometric-security.png') }}" alt="">
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
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
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
