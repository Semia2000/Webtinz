@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="signup d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="row" style="width: 60%;">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
            </div>
            <div class="col signuptext " style="background-color: white; padding:20px">
                <div class="d-flex flex-column justify-content-start align-items-start">
                    <h2>Signup</h2>
                    <p>Continue to Webtinz</p>
                </div>
                <form>
                    <div class="form-groupminput-group mb-2">
                        <div class="input-group">
                            <input name="" class="form-control" placeholder="Full name" type="text">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group input-group mb-2">
                        <input name="" class="form-control" placeholder="Email address" type="email">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="bi bi-lock"></i> </span>
                        </div>
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" style="width: 100%;"> Continue </button>
                    </div> <!-- form-group// -->
                    <br>
                    <p class="divider-text text-center">
                        <span>&nbsp;&nbsp; or &nbsp;&nbsp;</span>
                    </p>
                    <div class="form-group input-group">
                        <input class="form-control" placeholder="Repeat password" type="password">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                        </div>
                    </div> <!-- form-group// -->
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn whatsapp-btn btn-block" style="width: 100%;">Login with
                            whatsapp</button>
                    </div> <!-- form-group// -->
                    <br>
                </form>
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
