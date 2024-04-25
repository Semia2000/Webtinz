@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
<section class=" d-flex justify-content-center align-items-center">
    <div class="listtemplates container" style="background-color:white" >
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2>Choose Template</h2>
            <p>Select your templates based upon your requirements </p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-0">
            <div class="col-4">
                <img src="{{ asset('assets/images/templateswebtinz/Group 79 (2).png') }}" alt="">
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/images/templateswebtinz/Group 80 (1).png') }}" alt="">
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/images/templateswebtinz/Group 80.png') }}" alt="">
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-0 ">
            <div class="col-4">
                <img src="{{ asset('assets/images/templateswebtinz/Group 78 (3).png') }}" alt="">
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/images/templateswebtinz/Group 78.png') }}" alt="">
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/images/templateswebtinz/Group 79.png') }}" alt="">
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p>Selected template </p>
            <h3>AirNex AI  Saas Startup</h3>
            <h5>Price : FCFA 4000</h5>
            <a href="">Continue</a>
        </div>
    </div>
</section>
@endsection
@section('js')
@endsection
