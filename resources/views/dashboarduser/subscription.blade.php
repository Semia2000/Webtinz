@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section id="plans" class="p-5 subscription">

            <div class="row row-cols-1 row-cols-md-3 ">
                @if($services)
                @foreach ($services as $service)
                <div class="col">
                    <div class="card mb-3 h-100" data-plan-id="{{ $service->subscription->id }}">
                        @if ($service->subscription->name == 'home')
                            <div class="card-header" style="background: #F1FCFF;">
                                HOME BUSINESS
                            </div>
                        @elseif ($service->subscription->name == 'small_mid')
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
                                <h2>{{ $service->subscription->price }}<span>&nbsp;&nbsp;Per/Year</span></h2>
                            </div>
                            <div class="mb-4 mt-4">
                                <ul class="nav nav-pills flex-column flex-sm-row text-center  border-0 rounded-nav" style="width:100%">
                                    <li class="nav-item flex-sm-fill">
                                        <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0  font-weight-bold active">Yearly</a>
                                    </li>
                                    <li class="nav-item flex-sm-fill">
                                        <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0  font-weight-bold">Yearly</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-3 plan-features">
                                <div class="mb-3 mt-2">
                                    <p><i class="bi bi-check-lg"></i>Ready Made Design </p>
                                    <p><i class="bi bi-check-lg"></i>File encryption</p>
                                    <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                                    <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                                </div>
                                <p><i style="color: #F05940;" class="bi bi-x-lg"></i>Setup
                                    Fee: {{ $service->subscription->setupfee }}</p>
                            </div>
                        </div>
                        <div class="d-flex liens text-center p-1">
                            <a href="" class="firstlink"
                            style="background: #2CC974;border:none;width:100%">Renew on May 5, 2024</a>
                        </div>
                    </div>
                </div>
                @endforeach 
                @endif
                {{-- <div class="col mb-4">
                    <div class="card h-100 mb-3">
                        <div class="card-header" style="background: #F1FCFF;">  Home Business</div>
                        <div class="card-body  text-left p-4">

                            <div class="ms-3 mb-4">
                                <h6>FCFA</h6>
                                <h2>5000 <span>Per/Month</span></h2>
                            </div>
                            <div class="mb-4 mt-4">
                                <ul class="nav nav-pills flex-column flex-sm-row text-center  border-0 rounded-nav" style="width:100%">
                                    <li class="nav-item flex-sm-fill">
                                        <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0  font-weight-bold active">Yearly</a>
                                    </li>
                                    <li class="nav-item flex-sm-fill">
                                        <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0  font-weight-bold">Yearly</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mb-3 mt-2">
                                <p><i class="bi bi-check-lg"></i>Ready Made Design </p>
                                <p><i class="bi bi-check-lg"></i>File encryption</p>
                                <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                                <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                            </div>

                        </div>
                        <div class="d-flex liens p-1">
                            <a href="" class="firstlink" style="background: green;">Renew on May 5, 2024</a>
                        </div>
                    </div>
                </div>

                <div class="col mb-4 ">
                    <div class="card h-100  mb-3">
                        <div class="card-header" style="background: #FFF6EC
                    ;">  Small & Mid
                            size Business</div>
                        <div class="card-body text-left p-4">
                            <div class="ms-3 mb-4">
                                <h6>FCFA</h6>
                                <h2>5000 <span>Per/Month</span></h2>
                            </div>
                            <div class="d-flex liens mb-4">
                                <a href="" class="firstlink"
                                    style="background: #8568FC
                            ">Prend ta carte</a>
                            </div>
                            <div class="mb-3">
                                <p><i class="bi bi-check-lg"></i>Ready Made Design </p>
                                <p><i class="bi bi-check-lg"></i>File encryption</p>
                                <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                                <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                            </div>
                        </div>
                        <div class="d-flex liens p-1">
                            <a href="" class="firstlink" style="background: #F05940;">Upgrade</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100
                    h-100 mb-3">
                        <div class="card-header" style="background: #F1FCFF;">  Enterprise</div>
                        <div class="card-body text-left p-4">
                            <div class="ms-3 mb-4">
                                <h6>FCFA</h6>
                                <h2>5000 <span>Per/Month</span></h2>
                            </div>
                            <div class="d-flex liens mb-4">
                                <a href="" class="firstlink"
                                    style="background: #2CC974
                            ">Prend ta carte</a>
                            </div>
                            <div class="mb-3">
                                <p><i class="bi bi-check-lg"></i>Ready Made Design </p>
                                <p><i class="bi bi-check-lg"></i>File encryption</p>
                                <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                                <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                            </div>

                        </div>
                        <div class="d-flex liens p-1">
                            <a href="" class="firstlink" style="background: #F05940;">Upgrade</a>
                        </div>
                    </div>
                </div> --}}
            </div>
    </section>
@endsection
@section('js')
@endsection
