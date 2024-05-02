@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="signup flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-5  mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col signuptext  flex-column d-flex justify-content-center align-items-center" style="background-color: white;">
                <div class="text-left">
                    <h3>Enter OTP</h3>
                    <p>4 digit OTP and link was sent <span> to maanas20@gmail.com</span></p>

                    <form>
                        <div class="form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input name="" class="form-control" placeholder="Full name" type="text">
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y" style="pointer-events: none;"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940"> Continue </button>
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
