@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
<?php 
$selectedValue = isset($_GET['selectedValue']) ? $_GET['selectedValue'] : null;
?>
    <section class="signup flex-column d-flex justify-content-center align-items-center" >
        <div class="text-center mt-4  mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="row row-cols-1 row-cols-md-2">

            <div class="col signuptext" style="background-color: white;">
                <div class="p-2">
                    <h2>Signup</h2>
                    <p>Continue to Webtinz</p>
                    <form>
                        <div class="mt-3 form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input name="" class="form-control" placeholder="Full name" type="text">
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>
                        <div class="form-group input-group mb-2">
                            <div class="input-group position-relative">
                                <input name="" class="form-control" placeholder="Email address" type="email">
                                <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <a  href="{{ route('otpverif') }}?selectedValue=<?php echo urlencode($selectedValue); ?>" class="btn btn-info btn-block"
                                style="width: 100%; border:1px solid #F05940"> Continue </a>
                        </div> <!-- form-group// -->
                        <br>
                        <p class="divider-text text-center">
                            <span>&nbsp;&nbsp; or &nbsp;&nbsp;</span>
                        </p>
                        <br>
                        <div class="form-group">
                            <a  href="{{ route('otpverif') }}?selectedValue=<?php echo urlencode($selectedValue); ?>" class="btn whatsapp-btn btn-block" style="width: 100%;"> <img src="{{ asset('assets/images/icons/google_2504739.png') }}" width="20" height="20" alt=""> &nbsp;&nbsp; Login with Gmail</a>
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
