@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class=" d-flex flex-column justify-content-center align-items-center">
        <div class="text-center mt-5 mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="sucesspay container d-flex flex-column justify-content-center align-items-center" style="background-color:white;width: 60%;height:400px" >

            <div class="text-center ">
                <i class="bi bi-check-circle-fill"></i>
                <h4>Request Successful!</h4>
                <p> Thank you for processing your most recent request. <br>
                    Your <span style="font-weight: 600;">request</span> will be analyzed and processed as quickly as possible 
                </p>
                <a href="{{ route('dashboarduser') }}">Go to Dashboard</a>
            </div>

        </div>
    </section>
@endsection
@section('js')
@endsection
