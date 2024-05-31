@extends('layouts_app.cloudlayout')
@section('links')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .plan-features p {
            font-family: 'Graphik', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 25px !important;
            color: #4E4E4E;
        }
    </style>
@endsection
@section('content')
    <section id="plans" class="d-flex flex-column justify-content-center align-items-center">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="text-center mt-5 mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="planschoose p-5">
            <div class="text-center mt-3 mb-5">
                <h3>Choose Your Plan</h3>
                <p>Select your plan based upon your requirements</p>
            </div>
            <div class="navtabs">
                <ul id="myTab" role="tablist"
                    class="nav nav-tabs nav-pills flex-column flex-sm-row text-center  border-0 rounded-nav">
                    <li class="nav-item flex-sm-fill">
                        <a id="pills-halfyearly-tab" data-toggle="pill" href="#pills-halfyearly" role="tab"
                            aria-controls="pills-halfyearly" aria-selected="true"
                            class="nav-link border-0 font-weight-bold active">6 Months</a>
                    </li>
                    <li class="nav-item flex-sm-fill">
                        <a class="nav-link border-0 font-weight-bold" id="pills-yearly-tab" data-toggle="pill"
                            href="#pills-yearly" role="tab" aria-controls="pills-yearly"
                            aria-selected="false">Yearly</a>
                    </li>
                </ul>
            </div>
            <!-- Pills content -->
            <div class="tab-content mt-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-halfyearly" role="tabpanel"
                    aria-labelledby="pills-halfyearly-tab">
                    <div class="p-3">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($subscriptionplans as $subscriptionplan)
                                @if ($subscriptionplan->duration == 6)
                                    <div class="col">
                                        <div class="card mb-3 h-100" data-plan-id="{{ $subscriptionplan->id }}">
                                            @if ($subscriptionplan->name == 'home')
                                                <div class="card-header" style="background: #F1FCFF;">
                                                    HOME BUSINESS
                                                </div>
                                            @elseif ($subscriptionplan->name == 'small_mid')
                                                <div class="card-header" style="background: #FFF6EC;">
                                                    SMALL & MID SIZE BUSINESS
                                                </div>
                                            @else
                                                <div class="card-header" style="background: #F1FCFF;">
                                                    ENTERPRISE
                                                </div>
                                            @endif

                                            <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                                                <div class="ms-3 mb-4">
                                                    <h6 style="font-weight: bold">FCFA</h6>
                                                    <h2>{{ $subscriptionplan->price }}<span>Per/Month</span></h2>
                                                </div>
                                                @if ($subscriptionplan->name == 'home')
                                                    <a href="" class="firstlink" style="background: #F05940;">
                                                    @elseif ($subscriptionplan->name == 'small_mid')
                                                        <a href="" class="firstlink"
                                                            style="background: #8568FC; border:none">
                                                        @else
                                                            <a href="" class="firstlink"
                                                                style="background: #2CC974;border:none">
                                                @endif
                                                <div class="d-flex liens mb-5">

                                                    Prend
                                                    ta
                                                    carte</a>
                                                </div>
                                                <div class="mb-3 plan-features">
                                                    @foreach ($subscriptionplan->features as $feature)
                                                        <p><i class="bi bi-check-lg"></i>{{ $feature }}</p>
                                                    @endforeach
                                                    <p><i style="color: #F05940;" class="bi bi-x-lg"></i>Setup
                                                        Fee: {{ $subscriptionplan->setupfee }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
                    <div class="p-3">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($subscriptionplans as $subscriptionplan)
                                @if ($subscriptionplan->duration == 12)
                                    <div class="col">
                                        <div class="card mb-3 h-100" data-plan-id="{{ $subscriptionplan->id }}">
                                            @if ($subscriptionplan->name == 'home')
                                                <div class="card-header" style="background: #F1FCFF;">
                                                    HOME BUSINESS
                                                </div>
                                            @elseif ($subscriptionplan->name == 'small_mid')
                                                <div class="card-header" style="background: #FFF6EC;">
                                                    SMALL & MID SIZE BUSINESS
                                                </div>
                                            @else
                                                <div class="card-header" style="background: #F1FCFF;">
                                                    ENTERPRISE
                                                </div>
                                            @endif
                                            <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                                                <div class="ms-3 mb-4">
                                                    <h6 style="font-weight: bold">FCFA</h6>
                                                    <h2>{{ $subscriptionplan->price }}<span>&nbsp;&nbsp;Per/Year</span></h2>
                                                </div>
                                                <div class="d-flex liens mb-5">
                                                    @if ($subscriptionplan->name == 'home')
                                                        <a href="" class="firstlink" style="background: #F05940;">
                                                        @elseif ($subscriptionplan->name == 'small_mid')
                                                            <a href="" class="firstlink"
                                                                style="background: #8568FC; border:none">
                                                            @else
                                                                <a href="" class="firstlink"
                                                                    style="background: #2CC974;border:none">
                                                    @endif
                                                    Prend ta carte</a>
                                                </div>
                                                <div class="mb-3 plan-features">
                                                    @foreach ($subscriptionplan->features as $feature)
                                                        <p><i class="bi bi-check-lg"></i>{{ $feature }}</p>
                                                    @endforeach
                                                    <p><i style="color: #F05940;" class="bi bi-x-lg"></i>Setup
                                                        Fee: {{ $subscriptionplan->setupfee }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="acceptpay d-flex flex-column align-items-center mt-3">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Subscription<span style="color:#F05940 "> term </span> and <span style="color:#F05940 "> agreement
                        </span>
                    </label>
                </div>
                <div class="d-flex liens mb-5">
                    <a href="{{ route('payement-process') }}" class="firstlink" style="background: #F05940">Pay</a>
                </div>
            </div> --}}

            <div class="acceptpay d-flex flex-column align-items-center mt-3">
                <form id="plan-form" action="{{ route('saveplanSelection', ['service_id' => $service->id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Subscription<span style="color:#F05940 "> term </span> and <span style="color:#F05940 ">
                                agreement
                            </span>
                        </label>
                    </div>
                    <input type="hidden" name="plan_id" id="selected-plan-id">
                    <div class="d-flex liens mb-5">
                        <button type="submit" id="continue-button" class="firstlink" style="background: #F05940"
                            >Pay</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const planCards = document.querySelectorAll('.card');
            const selectedPlanIdInput = document.getElementById('selected-plan-id');
            const continueButton = document.getElementById('continue-button');
            const termsCheckbox = document.getElementById('flexCheckDefault');

            planCards.forEach(function(card) {
                card.addEventListener('click', function() {
                    planCards.forEach(function(card) {
                        card.classList.remove('active');
                    });
                    this.classList.add('active');
                    selectedPlanIdInput.value = this.getAttribute('data-plan-id');
                });
            });


            continueButton.addEventListener('click', function(event) {
                if (!selectedPlanIdInput.value) {
                    alert('Veuillez sélectionner un plan avant de continuer.');
                    event.preventDefault();
                } else if (!termsCheckbox.checked) {
                    alert('Veuillez accepter les conditions avant de continuer.');
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
