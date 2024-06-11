@extends('layouts_app.cloudlayout')

@section('links')
<style>
    .hidden {
        display: none;
    }
    #ecom-fields input[type="radio"]{
    background-color: #F05940;
    border-color: #DCDCDC;
    }
</style>
@endsection

@section('content')
    <section class="contactinf flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-5 mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="contactback">
            <div class="row">
                <h2>About Your Company</h2>
                <p>Provide company complete information</p>
                <form method="POST" action="{{ route('formsaboutservices.store', ['service_id' => $service->id]) }}">
                    @csrf
                    <input type="hidden" name="selected_service_id" value="{{ $service->id }}">
                    <input type="hidden" id="selected_service" name="selected_service" value="{{ $service->service_type }}">

                    <div class="mt-4">
                        <label for="description" class="form-label labeltitle">Company Information<span class="required">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            value="{{ old('description') }}" required autocomplete="description" placeholder="Company Informations"
                            id="description" rows="5"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="products_services" class="form-label labeltitle">
                            @if ($service->service_type == 'web')
                              Products or services
                             @else
                             Products
                            @endif
                            <span class="required">*</span></label>
                        <textarea class="form-control @error('products_services') is-invalid @enderror" name="products_services"
                            value="{{ old('products_services') }}" required autocomplete="products_services" placeholder="Products or services"
                            id="products_services" rows="5"></textarea>
                        @error('products_services')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if ($service->service_type == 'ecom')
                    <div id="ecom-fields" class="hidden">
                        <div class="form-group mt-5">
                            <label>Select Product Category</label><br>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" name="commerce_mode" value="multi_product" id="multi_product" checked>
                                    <label for="commerce_mode">Multi Products</label>
                                </div>
                                <div class="col">
                                    <input type="radio" name="commerce_mode" value="single_product" id="single_product">
                                    <label for="commerce_mode">Single Product</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-goup mt-3 mb-5">
                            <label for="productcategory">Product Category</label>
                            <div class="row">
                                @php
                                    $chunks = $productcategorys->chunk(5); // Divise les catégories en groupes de 5
                                @endphp
                                @foreach ($chunks as $chunk)
                                    <div class="col">
                                        @foreach ($chunk as $productcategory)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="{{ $productcategory->name }}"
                                                    name="productcategory[]" id="{{ $productcategory->name }}">
                                                <label class="form-check-label" for="{{ $productcategory->name }}">
                                                    {{ $productcategory->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <div id="businessector" class="hidden">
                        <div class="mt-5">
                            <label for="sector" class="form-label labeltitle">Select Business Sector<span class="required">*</span></label>
                            <div class="row mt-3 mb-5">
                                <div class="col">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="Automotive"
                                            name="sector" id="sector_automotive" onclick="limitSelection(this)">
                                        <label class="form-check-label" for="sector_automotive">
                                            Automotive
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="Business Support"
                                            name="sector" id="sector_business_support" onclick="limitSelection(this)">
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
                                        <input class="form-check-input" type="checkbox" value="Entertainment"
                                            name="sector" id="sector_entertainment" onclick="limitSelection(this)">
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
                                        <input class="form-check-input" type="checkbox" value="Real Estate"
                                            name="sector" id="sector_real_estate" onclick="limitSelection(this)">
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
                                        <input class="form-check-input" type="checkbox" value="Personal Care"
                                            name="sector" id="sector_personal_care" onclick="limitSelection(this)">
                                        <label class="form-check-label" for="sector_personal_care">
                                            Personal Care
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="Health & Medicine"
                                            name="sector" id="sector_health_medicine" onclick="limitSelection(this)">
                                        <label class="form-check-label" for="sector_health_medicine">
                                            Health & Medicine
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="Home & Garden"
                                            name="sector" id="sector_home_garden" onclick="limitSelection(this)">
                                        <label class="form-check-label" for="sector_home_garden">
                                            Home & Garden
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="Information Technology"
                                            name="sector" id="sector_information_technology"
                                            onclick="limitSelection(this)">
                                        <label class="form-check-label" for="sector_information_technology">
                                            Information Technology
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="Food & Dining"
                                            name="sector" id="sector_food_dining" onclick="limitSelection(this)">
                                        <label class="form-check-label" for="sector_food_dining">
                                            Food & Dining
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="Manufacturing"
                                            name="sector" id="sector_manufacturing" onclick="limitSelection(this)">
                                        <label class="form-check-label" for="sector_manufacturing">
                                            Manufacturing
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="others_services" class="form-label labeltitle">
                            @if ($service->service_type == 'Web Site')
                            Other Services
                           @else
                           Other Product Category
                          @endif
                           <span class="required">*</span></label>
                        <textarea class="form-control @error('others_services') is-invalid @enderror" name="others_services"
                            value="{{ old('others_services') }}" required autocomplete="others_services" placeholder="Other Services"
                            id="others_services" rows="5"></textarea>
                        @error('others_services')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" style="width: 100%; border:1px solid #F05940">
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
    document.addEventListener('DOMContentLoaded', function() {
        const selectedService = document.getElementById('selected_service').value;
        const ecomFields = document.getElementById('ecom-fields');
        const businessectorField = document.getElementById('businessector');

        if (selectedService === "ecom") {
            ecomFields.classList.remove('hidden');
            businessectorField.classList.add('hidden');
        } else if (selectedService === "web") {
            businessectorField.classList.remove('hidden');
            ecomFields.classList.add('hidden');
        }
    });

    function limitSelection(selectedCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="sector"]');
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== selectedCheckbox) {
                checkbox.checked = false;
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const multiProductRadio = document.getElementById('multi_product');
        const singleProductRadio = document.getElementById('single_product');
        const checkboxes = document.querySelectorAll('input[name="productcategory[]"]');

        function updateCheckboxes() {
            if (singleProductRadio.checked) {
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                    checkbox.disabled = false;
                    checkbox.addEventListener('change', handleSingleProductSelection);
                });
            } else {
                checkboxes.forEach((checkbox) => {
                    checkbox.removeEventListener('change', handleSingleProductSelection);
                    checkbox.disabled = false;
                });
            }
        }

        function handleSingleProductSelection(event) {
            if (event.target.checked) {
                checkboxes.forEach((checkbox) => {
                    if (checkbox !== event.target) {
                        checkbox.disabled = true;
                    }
                });
            } else {
                checkboxes.forEach((checkbox) => {
                    checkbox.disabled = false;
                });
            }
        }

        multiProductRadio.addEventListener('change', updateCheckboxes);
        singleProductRadio.addEventListener('change', updateCheckboxes);

        updateCheckboxes();
    });
</script>
@endsection
