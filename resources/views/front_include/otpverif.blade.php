@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
<?php
    // Récupérer la valeur du paramètre d'URL "selectedValue"
    $selectedValue = isset($_GET['selectedValue']) ? $_GET['selectedValue'] : null;
?>
    <section class="signup flex-column d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="text-center mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col signuptext " style="background-color: white;">
                <div class="text-left ">
                    <h2 class="mb-4">Enter OTP</h2>
                    <p>4 digit OTP and link was sent <br> <span style="color:#F05940"> to maanas20@gmail.com</span></p>

                    <form>
                        <div class="mt-4 form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input name="" class="form-control" placeholder="Otp Code" type="text">
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            @if ($selectedValue == 'option3')
                            <a href="{{ route('custumform') }}" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940">Continue </a>
                            @else
                            <a href="{{ route('contactinfo') }}?selectedValue=<?php echo urlencode($selectedValue); ?>" class="btn btn-info btn-block"
                                style="width: 100%; border:1px solid #F05940"> Continue </a>
                            @endif    
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
