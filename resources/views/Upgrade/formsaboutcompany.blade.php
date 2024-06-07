@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="contactinf flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-5  mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="contactback">
            <div class="row">
                <h2>About Your Company</h2>
                <p>Provide company complete information
                </p>
                <form method="POST" action="{{ route('showUpgradeForm.store',['service_id'=> $service->id]) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="description" class="form-label labeltitle">Company Information<span
                                class="required">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            value="{{  $service->description }}" required autocomplete="description" placeholder="Company Informations"
                            id="description" rows="5"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="products_services" class="form-label labeltitle">Products or services<span
                                class="required">*</span></label>
                        <textarea class="form-control @error('products_services') is-invalid @enderror" name="products_services"
                            value="{{ $service->products_services }}" required autocomplete="products_services" placeholder="Products or services"
                            id="products_services" rows="5"></textarea>
                        @error('products_services')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sector" class="form-label labeltitle">Select Business Sector<span class="required">*</span></label>
                        <div class="row mt-3 mb-5">
                            <div class="col">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Automotive" name="sector"
                                        id="sector_automotive" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_automotive">
                                        Automotive
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Business Support" name="sector"
                                        id="sector_business_support" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_business_support">
                                        Business Support
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Computers" name="sector"
                                        id="sector_computers" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_computers">
                                        Computers
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Entertainment" name="sector"
                                        id="sector_entertainment" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_entertainment">
                                        Entertainment
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Education" name="sector"
                                        id="sector_education" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_education">
                                        Education
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Real Estate" name="sector"
                                        id="sector_real_estate" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_real_estate">
                                        Real Estate
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Travels" name="sector"
                                        id="sector_travels" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_travels">
                                        Travels
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Others" name="sector"
                                        id="sector_others" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_others">
                                        Others
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Retail" name="sector"
                                        id="sector_retail" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_retail">
                                        Retail
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Personal Care" name="sector"
                                        id="sector_personal_care" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_personal_care">
                                        Personal Care
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Health & Medicine" name="sector"
                                        id="sector_health_medicine" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_health_medicine">
                                        Health & Medicine
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Home & Garden" name="sector"
                                        id="sector_home_garden" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_home_garden">
                                        Home & Garden
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Information Technology" name="sector"
                                        id="sector_information_technology" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_information_technology">
                                        Information Technology
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Food & Dining" name="sector"
                                        id="sector_food_dining" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_food_dining">
                                        Food & Dining
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="Manufacturing" name="sector"
                                        id="sector_manufacturing" onclick="limitSelection(this)">
                                    <label class="form-check-label" for="sector_manufacturing">
                                        Manufacturing
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="others_services" class="form-label labeltitle">Other Services <span
                                class="required">*</span></label>
                        <textarea class="form-control @error('others_services') is-invalid @enderror" name="others_services"
                            value="{{ old('others_services') }}" required autocomplete="others_services" placeholder="Other Services "
                            id="others_services" rows="5"></textarea>
                        @error('others_services')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940">
                            {{ __('Continue') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
    function limitSelection(selectedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="sector"]');
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== selectedCheckbox) {
                checkbox.checked = false;
            }
        });
    }
    </script>
@endsection
