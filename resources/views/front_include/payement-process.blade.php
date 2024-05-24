@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class=" d-flex flex-column justify-content-center align-items-center">
        <div class="text-center mt-3 mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="processpay d-flex flex-column justify-content-center align-items-center pt-5 mb-5"
            style="background-color:white;">

            <div class="row row-cols-1 row-cols-md-2 pb-3">
                <div class="col-4">
                    <h4>Your subscription Summary</h4>
                    <p>See your subscriptions details</p>
                    <div class="card mb-3">
                        <div class="card-header pt-2">
                            <h5>Your Plan </h5>
                            <h3>Home Business Plan</h3>
                            <h2>FCFA 5000 <span><i class="bi bi-pencil"></i></span> </h2>
                            <hr>
                            <h5>Your Plan </h5>
                            <h3>Home Business Plan</h3>
                            <h2>FCFA 5000 <span><i class="bi bi-pencil"></i></span> </h2>
                            <hr>
                            <h5>Your Plan </h5>
                            <h3>Home Business Plan</h3>
                            <h2>FCFA 5000 <span><i class="bi bi-pencil"></i></span> </h2>
                            <hr>
                        </div>
                        <div class="card-body">
                            <h3>Total Price </h3>
                            <h2>FCFA 5000</h2>
                        </div>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            I accept <span style="color:#F05940 ">terms of use</span> & <span
                                style="color:#F05940 ">Policy</span>
                        </label>
                    </div>
                </div>
                <div class="col-8 d-flex align-items-center justify-content-center">

                    <div class="radiochoice d-flex  flex-column justify-content-center">
                        <p>Select your payment options</p>
                        <div class="radiocheck mb-3" checked>
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1"
                                checked>
                            <label class="form-check-label" for="radio1">
                                <img width="80" height="30" src="{{ asset('assets/images/paypal.png') }}"
                                    alt="">
                            </label>
                        </div>
                        <div class="radiocheck mb-3" style="">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                            <label class="form-check-label" for="radio2">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="background-color:#FECC00; width:80px;height:40px">
                                    <img width="50" height="30" src="{{ asset('assets/images/image 58.png') }}"
                                        alt="">
                                </div>
                            </label>
                        </div>
                        <div class="radiocheck  mb-3">
                            <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                            <label class="form-check-label" for="radio3">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="background-color:#1E3C71; width:80px;height:40px">
                                    <img width="50" height="30" src="{{ asset('assets/images/image 59.png') }}"
                                        alt="">
                                </div>

                            </label>
                        </div>
                        <div class="d-flex liens mb-5">
                            <a href="{{ route('paysuccessful') }}" class="firstlink" style="background: #F05940">Pay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
