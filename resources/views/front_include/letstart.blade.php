@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
<section class="d-flex justify-content-center align-items-center" style="height: 80vh; padding: 60px;">
    <div class="startprocess" style="width: 70%;">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col-6 letstext d-flex justify-content-center align-items-center p-5" style="background-color: white;">
                <div>
                    <h2>Lets Get Started!</h2>
                    <p>Select your business type</p>
                    <div class="radiochoice d-flex flex-column">
                        <div class="radiocheck d-flex align-items-center mb-3">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>
                            <label class="form-check-label" for="radio1">
                                <img class="mx-3" src="{{ asset('assets/images/icons/ecommerce.png') }}" width="30" height="30" alt="Description de l'image"> Web Site
                            </label>
                        </div>
                        <div class="radiocheck d-flex align-items-center mb-3">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                            <label class="form-check-label" for="radio2">
                                <img class="mx-3" src="{{ asset('assets/images/icons/ecommerce.png') }}" width="30" height="30" alt="Description de l'image"> Ecommerce
                            </label>
                        </div>
                        <div class="radiocheck d-flex align-items-center mb-3">
                            <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                            <label class="form-check-label" for="radio3">
                                <img class="mx-3" src="{{ asset('assets/images/icons/ecommerce.png') }}" width="30" height="30" alt="Description de l'image"> Custom Digitalization
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="letsimage col-6 d-flex justify-content-center align-items-center" style="background-color: #FFF6EC;">
                <img src="{{ asset('assets/images/girl-choosing-one-option.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    
@endsection