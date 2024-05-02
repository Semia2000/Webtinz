@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class=" d-flex flex-column justify-content-center align-items-center">
        <div class="text-center mt-5 mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="listtemplates container" style="background-color:white" >
            <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                <h2>Choose Template</h2>
                <p class="text-center">Select your templates based upon your requirements </p>
                <div class="input-group rounded mt-5 mb-5" style="width: 50%">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <img src="{{ asset('assets/images/templateswebtinz/Group 79 (2).png') }}" width="100%" height="100%"
                        alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/templateswebtinz/Group 80 (1).png') }}" width="100%" height="100%"
                        alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/templateswebtinz/Group 80.png') }}" alt="" width="100%"
                        height="100%">
                </div>

            </div>
            <hr>
            <div class="text-center flex-column d-flex justify-content-center align-items-center ">
                <p>Selected template </p>
                <h3>AirNex AI Saas Startup</h3>
                <h5>Price : FCFA 4000</h5>
                <a href="">Continue</a>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
