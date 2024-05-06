@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class=" d-flex flex-column justify-content-center align-items-center mb-5">
        <div class="text-center mt-5 mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="listtemplates container " style="background-color:white">
            <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                <h3>Choose Template</h3>
                <p class="text-center">Select your templates based upon your requirements </p>
                <div class="input-group rounded mt-3 mb-3" style="width: 50%">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 mt-5">
                <div class="col">
                    <div class="card">
                        <img class="" src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (2).png') }}"
                            width="100%" alt="">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="me-auto">Tactix Extend</h4>
                                <h4 class="templateprice ms-auto">FCFA 2000</h4>
                            </div>
                            <p>By Netzilians</p>
                            <a href="">Wordpress</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img class="" src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (3).png') }}"
                            width="100%" alt="">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="me-auto">Tactix Extend</h4>
                                <h4 class="templateprice ms-auto">FCFA 2000</h4>
                            </div>
                            <p>By Netzilians</p>
                            <a href="">Wordpress</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img class="" src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (1).png') }}"
                            width="100%" alt="">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="me-auto">Tactix Extend</h4>
                                <h4 class="templateprice ms-auto">FCFA 2000</h4>
                            </div>
                            <p>By Netzilians</p>
                            <a href="">Wordpress</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row row-cols-1 row-cols-md-3 mt-5">
                <div class="col">
                    <div class="card">
                        <img class="" src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (2).png') }}"
                            width="100%" alt="">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="me-auto">Tactix Extend</h4>
                                <h4 class="templateprice ms-auto">FCFA 2000</h4>
                            </div>
                            <p>By Netzilians</p>
                            <a href="">Wordpress</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img class="" src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (3).png') }}"
                            width="100%" alt="">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="me-auto">Tactix Extend</h4>
                                <h4 class="templateprice ms-auto">FCFA 2000</h4>
                            </div>
                            <p>By Netzilians</p>
                            <a href="">Wordpress</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img class="" src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (1).png') }}"
                            width="100%" alt="">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="me-auto">Tactix Extend</h4>
                                <h4 class="templateprice ms-auto">FCFA 2000</h4>
                            </div>
                            <p>By Netzilians</p>
                            <a href="">Wordpress</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="p-5 pb-0">
                <hr>
            </div>

            <div class="text-center flex-column d-flex justify-content-center align-items-center mb-5">
                <p>Selected template </p>
                <h3>AirNex AI Saas Startup</h3>
                <h5>Price : FCFA 4000</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I accept <span style="color:#F05940 ">terms of use</span> & <span
                            style="color:#F05940 ">Policy</span>
                    </label>
                </div>
                <a href="">Continue</a>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
