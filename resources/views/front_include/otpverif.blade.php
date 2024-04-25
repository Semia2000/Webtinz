@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="signup d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="row" style="width: 60%;">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
            </div>
            <div class="col signuptext " style="background-color: white; padding:50px">
                <div class="text-left">
                    <h3>Enter OTP</h3>
                    <p>4 digit OTP and link was sent <span> to maanas20@gmail.com</span></p>

                    <form>
                        <div class="form-groupminput-group mb-2">
                            <div class="input-group">
                                <input name="" class="form-control" placeholder="Full name" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" style="width: 100%;"> Continue </button>
                        </div> <!-- form-group// -->
                        <br>
                        <div class="d-flex">
                            <p>Didn't receive an OTP?</p>
                            <a class="" href="">Resend</a>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col signupimg" style="background-color: #FFF6EC;">
                <img src="{{ asset('assets/images/biometric-security.png') }}" alt="">
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
