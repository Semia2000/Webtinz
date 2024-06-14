@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="startpro d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="startprocess">
            <div class="text-center  mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
            </div>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col letstext" style="background-color: white;">
                    <div class="">
                        <h2>Lets Get Started!</h2>
                        <p>Select your business type</p>
                        <form id="serviceForm" method="POST" action="{{ route('saveService') }}">
                            @csrf
                            <div class="radiochoice">
                            <div class="form-group radiocheck mb-3 active">
                                <input type="radio" class="form-check-input" id="radio1" name="service_type" value="web" checked >
                                <label class="form-check-label" for="radio1">
                                    <i class="bi bi-receipt mx-2"></i> Web Site
                                </label>
                            </div>
                            <div class="form-group radiocheck mb-3">
                                <input type="radio" class="form-check-input" id="radio2" name="service_type" value="ecom">
                                <label class="form-check-label" for="radio2">
                                    <i class="bi bi-receipt mx-2"></i> Ecommerce
                                </label>
                            </div>
                            <div class="form-group radiocheck mb-3">
                                <input type="radio"class="form-check-input" id="radio3" name="service_type" value="Custom">
                                <label class="form-check-label" for="radio3">
                                    <i class="bi bi-receipt mx-2"></i> Custom Digitalization
                                </label>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary"
                            style="width: 50%; border:1px solid #F05940;background-color:#F05940" id="continueLink" >Continue</button>
                        </form>

                    </div>
                    {{-- <a id="continueLink" style="color: white">Continue</a> --}}
                </div>
                <div class="letsimage col text-center " style="background-color: #FFF6EC;">
                    <img src="{{ asset('assets/images/girl-choosing-one-option.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioButtons = document.querySelectorAll('.radiocheck');

            radioButtons.forEach(function(radioButton) {
                radioButton.addEventListener('click', function() {
                    radioButtons.forEach(function(radioButton) {
                        radioButton.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const continueBtn = document.getElementById('continueLink');
            const radioButtons = document.querySelectorAll('.radiocheck input');

            continueBtn.addEventListener('click', function() {
                    let selectedService = '';
                    radioButtons.forEach(function(radioButton) {
                        if (radioButton.checked) {
                            selectedService = radioButton.value;
                        }
                    });

                    if (selectedService === '') {
                        alert('Please select a service.');
                        return;
                    }

            });
        });
    </script>
@endsection
