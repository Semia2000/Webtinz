@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class=" d-flex flex-column justify-content-center align-items-center">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="text-center mt-5 mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="sucesspay container d-flex flex-column justify-content-center align-items-center"
            style="background-color:white;width: 60%;height:400px">

            <div class="text-center ">
                <i class="bi bi-check-circle-fill"></i>
                <h4>Payment Successful!</h4>
                <p> Thank you for processing your most recent payment. <br>
                    Your <span style="font-weight: 600;">
                        @if ($service->subscription->name == 'home')
                            HOME BUSINESS
                        @elseif ($service->subscription->name == 'small_mid')
                            SMALL & MID SIZE BUSINESS
                        @else
                            ENTERPRISE
                        @endif
                    </span> subscription will expire on <span style="color:#F05940">{{ $service->end_date }}</span>
                </p>
                <a href="{{ route('dashboarduser') }}">Go to Dashboard</a>
            </div>

        </div>
    </section>
@endsection
@section('js')
@endsection
