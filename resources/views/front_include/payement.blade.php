@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section id="plans" class="d-flex flex-column justify-content-center align-items-center">
        <div class="text-center mt-5 mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="planschoose">
            <div class="text-center mt-3 mb-5">
                <h3>Choose Your Plan</h3>
                <p>Select your plan based upon your requirements</p>
            </div>
            <div class="navtabs">
                <!-- Rounded tabs -->
                <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center  border-0 rounded-nav">
                  <li class="nav-item flex-sm-fill">
                    <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0  font-weight-bold active">6 Months</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0  font-weight-bold">Yearly</a>
                  </li>
                </ul>
            </div>
            <div class="p-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card  mb-3">
                            <div class="card-header" style="background: #F1FCFF;">  Home Business</div>
                            <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                                <div class="ms-3 mb-4">
                                    <h6>FCFA</h6>
                                    <h2>5000 <span>Per/Month</span></h2>
                                </div>
                                <div class="d-flex liens mb-5">
                                    <a href="" class="firstlink" style="background: #F05940;">Prend ta carte</a>
                                </div>
                                <div class="mb-3">
                                    <p><i class="bi bi-check-lg"></i>Ready Made Design </p>
                                    <p><i class="bi bi-check-lg"></i>File encryption</p>
                                    <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                                    <p><i class="bi bi-check-lg"></i>Unlimited client users</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card  mb-3">
                            <div class="card-header" style="background: #FFF6EC
                        ;">  Small & Mid
                                size Business</div>
                            <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                                <div class="ms-3 mb-4">
                                    <h6>FCFA</h6>
                                    <h2>5000 <span>Per/Month</span></h2>
                                </div>
                                <div class="d-flex liens mb-5">
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
                        </div>
                    </div>
                    <div class="col">
                        <div class="card  mb-3">
                            <div class="card-header" style="background: #F1FCFF;">  Enterprise</div>
                            <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                                <div class="ms-3 mb-4">
                                    <h6>FCFA</h6>
                                    <h2>5000 <span>Per/Month</span></h2>
                                </div>
                                <div class="d-flex liens mb-5">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
