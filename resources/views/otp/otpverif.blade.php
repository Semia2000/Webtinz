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
                    <h2 class="mb-4">Enter OTP</h2>
                    <p>4 digit OTP and link was sent <br> <span style="color:#F05940">{{ Auth::user()->email }}</span></p>

                    <div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('warning') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('otpverif.verify') }}">
                        @csrf

                        <div class="mt-4 form-group input-group mb-2">
                            <div class="input-group">
                                <input id="otpcode" type="text"
                                    class="form-control @error('otpcode') is-invalid @enderror" name="otpcode"
                                    value="{{ old('otpcode') }}" required autocomplete="otpcode" placeholder="otpcode">
                                @error('otpcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block"
                                style="width: 100%; border:1px solid #F05940">
                                {{ __('Continue') }}
                            </button>
                        </div>
                        <br>
                        <div class="d-flex">
                            <p>Didn't receive an OTP?</p>
                            <a class="ms-auto" href="" style="color: #F05940">Resend</a>
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
