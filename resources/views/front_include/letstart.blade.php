@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="startpro d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="startprocess" >
            <div class="text-center  mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
            </div>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col letstext"
                    style="background-color: white;">
                    <div class="">
                        <h2>Lets Get Started!</h2>
                        <p>Select your business type</p>
                        <div class="radiochoice ">
                            <div class="radiocheck  mb-3" >
                                <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                    value="option1"  >
                                <label class="form-check-label" for="radio1">
                                    <i class="bi bi-receipt mx-2"></i> Web Site
                                </label>
                            </div>
                            <div class="radiocheck  mb-3">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                    value="option2">
                                <label class="form-check-label" for="radio2">
                                    <i class="bi bi-receipt mx-2"></i> Ecommerce
                                </label>
                            </div>
                            <div class="radiocheck  mb-3">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio"
                                    value="option3">
                                <label class="form-check-label" for="radio3">
                                    <i class="bi bi-receipt mx-2"></i> Custom Digitalization
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="letsimage col text-center "
                    style="background-color: #FFF6EC;">
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
@endsection
