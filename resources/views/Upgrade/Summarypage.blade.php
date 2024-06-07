@extends('layouts_app.cloudlayout')
@section('links')
    <style>
        .contactinf .edit-icon.editing {
            padding: 5px 5px;
            font-size: 10px;
            background-color: green;
            color: white;
            border-radius: 50%;
        }


        .form-control.editing,
        .form-select.editing,
        .form-label.editing {
            border-color: black;
            /* Changez la bordure des champs d'entrée */
            color: black;
            /* Changez la couleur du texte des labels */
        }

        .hidden {
            display: none;
        }
    </style>
@endsection
@section('content')
    <section class="contactinf flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-5  mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="contactback ">
            <div class="row">
                <div class="text-center">
                    <h2>Summary </h2>
                    <p>Check your complete information whatever you have shared
                    </p>
                </div>
                <hr class="mt-3 mb-2">
                <h6 class="mt-4 mb-4">Company Contact Info &nbsp;&nbsp;<span><i class="bi bi-pencil edit-icon"
                            data-target="contact-info"></i></span></h6>

                <form method="POST"
                    action="{{ route('showUpgradesummary.store', ['companyId' => $companyinfo->first()->id, 'service_id' => $service->id]) }}">
                    @csrf

                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <input type="hidden" name="selected_service" id="selected_service"
                        value="{{ $service->service_type }}">
                    @if ($companyinfo)
                        <input type="hidden" name="company_id" value="{{ $companyinfo->first()->id }}">
                        <div class="row" id="contact-info">
                            <!-- Champ Company Name -->
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="company_name">Company Name<span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="company_name" name="name"
                                            value="{{ $companyinfo->first()->name }}" placeholder="Company Name" readonly>
                                        <i
                                            class="bi bi-person-circle position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>

                                <!-- Champ Email -->
                                <div class="col">
                                    <label for="email">Email Address<span class="required">*</span></label>
                                    <div class="input-group position-relative">
                                        <input type="email" class="form-control pr-5" id="email" name="email"
                                            value="{{ $companyinfo->first()->email }}" placeholder="Email Address" readonly>
                                        <i
                                            class="bi bi-envelope position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Champ Address -->
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="address">Street Address<span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $companyinfo->first()->address }}" placeholder="Street Address"
                                            readonly>
                                        <i class="bi bi-geo-alt position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>

                                <!-- Champ Country -->
                                <div class="col">
                                    <label for="country">Country<span class="required">*</span></label>
                                    <select id="country" class="form-select form-select-md" name="country"
                                        value="{{ old('country', $companyinfo->first()->country) }}" disabled>
                                        <option selected>Benin</option>
                                    </select>
                                    <input type="hidden" name="country" value="{{ $companyinfo->first()->country }}">
                                </div>
                            </div>

                            <!-- Champ State -->
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="state">State / Province<span class="required">*</span></label>
                                    <select id="state" class="form-select form-select-md" name="state"
                                        value="{{ old('state', $companyinfo->first()->state) }}" disabled>
                                        <option selected>Littoral</option>
                                    </select>
                                    <input type="hidden" name="state" value="{{ $companyinfo->first()->state }}">
                                </div>

                                <!-- Champ Phone -->
                                <div class="col">
                                    <label for="phone">Phone<span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control pr-5" id="phone" name="tel"
                                            value="{{ $companyinfo->first()->tel }}" placeholder="Phone" readonly>
                                        <i
                                            class="bi bi-telephone position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <hr class="mt-5 mb-2">
                    <h6 class="mt-4 mb-4">Company Info &nbsp;&nbsp;<span><i class="bi bi-pencil edit-icon"
                                data-target="company-info"></i></span></h6>

                    @if ($service)
                        <div class="row" id="company-info">
                            <div class="mb-3">
                                <label for="description" class="form-label labeltitle">Company Information <span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    placeholder="{{ $service->description }}" readonly>{{ $service->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="products_services" class="form-label labeltitle">Products or services<span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="products_services" name="products_services" rows="5"
                                    placeholder="{{ $service->products_services }}" readonly>{{ $service->products_services }}</textarea>
                            </div>

                            @if ($service->service_type == 'ecom')
                                <div id="ecom-fields" class="hidden">
                                    <div class="form-group mt-5">
                                        <label>Product Type</label><br>
                                        <div class="row">
                                            <div class="col">
                                                <input type="radio" name="commerce_mode" value="multi_product" 
                                                    id="multi_product"
                                                    {{ $service->commerce_mode == 'multi_product' ? 'checked' : '' }} disabled>
                                                    <input type="hidden" name="commerce_mode" value="multi_product"
                                                    id="multi_product" value="{{ $service->commerce_mode}}">
                                                <label for="commerce_mode">Multi Products</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="commerce_mode" value="single_product"
                                                    id="single_product"
                                                    {{ $service->commerce_mode == 'single_product' ? 'checked' : '' }} disabled>
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
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $productcategory->name }}" name="productcategory[]"
                                                                id="{{ $productcategory->name }}">
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
                                <div class="form-goup">
                                    <div class="row ">
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Automotive"
                                                    name="sector[]" id="sector_automotive"
                                                    @if (in_array('Automotive', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_automotive">Automotive</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Business Support"
                                                    name="sector[]" id="sector_business_support"
                                                    @if (in_array('Business Support', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_business_support">Business
                                                    Support</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Computers"
                                                    name="sector[]" id="sector_computers"
                                                    @if (in_array('Computers', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_computers">Computers</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Entertainment"
                                                    name="sector[]" id="sector_entertainment"
                                                    @if (in_array('Entertainment', $selectedSector)) checked @endif>
                                                <label class="form-check-label"
                                                    for="sector_entertainment">Entertainment</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Education"
                                                    name="sector[]" id="sector_education"
                                                    @if (in_array('Education', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_education">Education</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Real Estate"
                                                    name="sector[]" id="sector_real_estate"
                                                    @if (in_array('Real Estate', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_real_estate">Real
                                                    Estate</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Travels"
                                                    name="sector[]" id="sector_travels"
                                                    @if (in_array('Travels', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_travels">Travels</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Others"
                                                    name="sector[]" id="sector_others"
                                                    @if (in_array('Others', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_others">Others</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Retail"
                                                    name="sector[]" id="sector_retail"
                                                    @if (in_array('Retail', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_retail">Retail</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Personal Care"
                                                    name="sector[]" id="sector_personal_care"
                                                    @if (in_array('Personal Care', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_personal_care">Personal
                                                    Care</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Health & Medicine"
                                                    name="sector[]" id="sector_health_medicine"
                                                    @if (in_array('Health & Medicine', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_health_medicine">Health &
                                                    Medicine</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Home & Garden"
                                                    name="sector[]" id="sector_home_garden"
                                                    @if (in_array('Home & Garden', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_home_garden">Home &
                                                    Garden</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox"
                                                    value="Information Technology" name="sector[]"
                                                    id="sector_information_technology"
                                                    @if (in_array('Information Technology', $selectedSector)) checked @endif>
                                                <label class="form-check-label"
                                                    for="sector_information_technology">Information Technology</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Food & Dining"
                                                    name="sector[]" id="sector_food_dining"
                                                    @if (in_array('Food & Dining', $selectedSector)) checked @endif>
                                                <label class="form-check-label" for="sector_food_dining">Food &
                                                    Dining</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Manufacturing"
                                                    name="sector[]" id="sector_manufacturing"
                                                    @if (in_array('Manufacturing', $selectedSector)) checked @endif>
                                                <label class="form-check-label"
                                                    for="sector_manufacturing">Manufacturing</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="others_services" class="form-label labeltitle">Other Services <span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="others_services" name="others_services" rows="5"
                                    placeholder="{{ $service->others_services }}" readonly>{{ $service->others_services }}</textarea>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940">Continue</button>
                    </div>
                </form>


            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.querySelectorAll('.edit-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.querySelectorAll('input, textarea, select').forEach(field => {
                        field.removeAttribute('readonly');
                        field.removeAttribute('disabled');
                        field.classList.add('editing');
                    });
                    targetElement.querySelectorAll('label').forEach(label => {
                        label.classList.add('editing');
                    });
                    this.classList.add('editing');
                }
            });
        });

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
