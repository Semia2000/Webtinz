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

                @php
                    $currentService = $serviceupgrade ?? $service;
                @endphp

                <form method="POST"
                    action="{{ route('showUpgradesummary.store', ['companyId' => $companyinfo->first()->id, 'id' => $currentService->id]) }}">
                    @csrf

                    <input type="hidden" name="service_id" value="{{ $currentService->id }}">
                    <input type="hidden" name="selected_service" id="selected_service"
                        value="{{ $currentService->service_type }}">
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

                    @if ($currentService)
                        <div class="row" id="company-info">
                            <div class="mb-3">
                                <label for="description" class="form-label labeltitle">Company Information <span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    placeholder="{{ $currentService->description }}" readonly>{{ $currentService->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="products_services" class="form-label labeltitle">Products or services<span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="products_services" name="products_services" rows="5"
                                    placeholder="{{ $currentService->products_services }}" readonly>{{ $currentService->products_services }}</textarea>
                            </div>

                            @if ($currentService->service_type == 'ecom')
                                <div id="ecom-fields" class="hidden">
                                    <div class="form-group mt-5">
                                        <label>Product Type</label><br>
                                        <div class="row">
                                            <div class="col">
                                                <input type="radio" name="commerce_mode" value="multi_product"
                                                    id="multi_product"
                                                    {{ $currentService->commerce_mode == 'multi_product' ? 'checked' : '' }}
                                                    disabled>
                                                <label for="commerce_mode">Multi Products</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="commerce_mode" value="single_product"
                                                    id="single_product"
                                                    {{ $currentService->commerce_mode == 'single_product' ? 'checked' : '' }}
                                                    disabled>
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
                                                                value="{{ $productcategory->name }}"
                                                                name="productcategory[]"
                                                                id="{{ $productcategory->name }}">
                                                            <label class="form-check-label"
                                                                for="{{ $productcategory->name }}">
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
                                    <label for="sector" class="form-label labeltitle">Select Business Sector<span
                                            class="required">*</span></label>
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
                                                    name="sector" id="sector_businesssupport"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_businesssupport">
                                                    Business Support
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox"
                                                    value="Consumer Packaged Goods" name="sector"
                                                    id="sector_consumerpackagedgoods" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_consumerpackagedgoods">
                                                    Consumer Packaged Goods
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Education"
                                                    name="sector" id="sector_education" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_education">
                                                    Education
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Energy"
                                                    name="sector" id="sector_energy" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_energy">
                                                    Energy
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox"
                                                    value="Financial Services" name="sector"
                                                    id="sector_financialservices" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_financialservices">
                                                    Financial Services
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Gaming"
                                                    name="sector" id="sector_gaming" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_gaming">
                                                    Gaming
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Healthcare"
                                                    name="sector" id="sector_healthcare" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_healthcare">
                                                    Healthcare
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Insurance"
                                                    name="sector" id="sector_insurance" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_insurance">
                                                    Insurance
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Manufacturing"
                                                    name="sector" id="sector_manufacturing"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_manufacturing">
                                                    Manufacturing
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Public Sector"
                                                    name="sector" id="sector_publicsector"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_publicsector">
                                                    Public Sector
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Retail"
                                                    name="sector" id="sector_retail" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_retail">
                                                    Retail
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox"
                                                    value="Telecommunications" name="sector"
                                                    id="sector_telecommunications" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_telecommunications">
                                                    Telecommunications
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Travel"
                                                    name="sector" id="sector_travel" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_travel">
                                                    Travel
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Transportation"
                                                    name="sector" id="sector_transportation"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_transportation">
                                                    Transportation
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Utilities"
                                                    name="sector" id="sector_utilities" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_utilities">
                                                    Utilities
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="others_services" class="form-label labeltitle">Other Services <span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="others_services" name="others_services" rows="5"
                                    placeholder="{{ $currentService->others_services }}" readonly>{{ $currentService->others_services }}</textarea>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940">Continue</button>
                    </div>
                </form>

                {{-- <form method="POST"
                    action="{{ route('showUpgradesummary.store', ['companyId' => $companyinfo->first()->id, 'id' => $serviceupgrade->id]) }}">
                    @csrf

                    <input type="hidden" name="service_id" value="{{ $serviceupgrade->id }}">
                    <input type="hidden" name="selected_service" id="selected_service"
                        value="{{ $serviceupgrade->service_type }}">
                    @if ($companyinfo)
                        <input type="hidden" name="company_id" value="{{ $companyinfo->first()->id }}">
                        <div class="row" id="contact-info">
                            <!-- Champ Company Name -->
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="company_name">Company Name<span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="company_name" name="name"
                                            value="{{ $companyinfo->first()->name }}" placeholder="Company Name"
                                            readonly>
                                        <i
                                            class="bi bi-person-circle position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>

                                <!-- Champ Email -->
                                <div class="col">
                                    <label for="email">Email Address<span class="required">*</span></label>
                                    <div class="input-group position-relative">
                                        <input type="email" class="form-control pr-5" id="email" name="email"
                                            value="{{ $companyinfo->first()->email }}" placeholder="Email Address"
                                            readonly>
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
                                        <i
                                            class="bi bi-geo-alt position-absolute top-50 end-0 me-2 translate-middle-y"></i>
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

                    @if ($serviceupgrade)
                        <div class="row" id="company-info">
                            <div class="mb-3">
                                <label for="description" class="form-label labeltitle">Company Information <span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    placeholder="{{ $serviceupgrade->description }}" readonly>{{ $serviceupgrade->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="products_services" class="form-label labeltitle">Products or services<span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="products_services" name="products_services" rows="5"
                                    placeholder="{{ $serviceupgrade->products_services }}" readonly>{{ $serviceupgrade->products_services }}</textarea>
                            </div>

                            @if ($serviceupgrade->service_type == 'ecom')
                                <div id="ecom-fields" class="hidden">
                                    <div class="form-group mt-5">
                                        <label>Product Type</label><br>
                                        <div class="row">
                                            <div class="col">
                                                <input type="radio" name="commerce_mode" value="multi_product"
                                                    id="multi_product"
                                                    {{ $serviceupgrade->commerce_mode == 'multi_product' ? 'checked' : '' }}
                                                    disabled>
                                                <input type="hidden" name="commerce_mode" value="multi_product"
                                                    id="multi_product" value="{{ $serviceupgrade->commerce_mode }}">
                                                <label for="commerce_mode">Multi Products</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" name="commerce_mode" value="single_product"
                                                    id="single_product"
                                                    {{ $serviceupgrade->commerce_mode == 'single_product' ? 'checked' : '' }}
                                                    disabled>
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
                                                                value="{{ $productcategory->name }}"
                                                                name="productcategory[]"
                                                                id="{{ $productcategory->name }}">
                                                            <label class="form-check-label"
                                                                for="{{ $productcategory->name }}">
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
                                    <label for="sector" class="form-label labeltitle">Select Business Sector<span
                                            class="required">*</span></label>
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
                                                    name="sector" id="sector_business_support"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_business_support">
                                                    Business Support
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Computers"
                                                    name="sector" id="sector_computers" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_computers">
                                                    Computers
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Entertainment"
                                                    name="sector" id="sector_entertainment"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_entertainment">
                                                    Entertainment
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Education"
                                                    name="sector" id="sector_education" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_education">
                                                    Education
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Real Estate"
                                                    name="sector" id="sector_real_estate"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_real_estate">
                                                    Real Estate
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Travels"
                                                    name="sector" id="sector_travels" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_travels">
                                                    Travels
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Others"
                                                    name="sector" id="sector_others" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_others">
                                                    Others
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Retail"
                                                    name="sector" id="sector_retail" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_retail">
                                                    Retail
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Personal Care"
                                                    name="sector" id="sector_personal_care"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_personal_care">
                                                    Personal Care
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Health & Medicine"
                                                    name="sector" id="sector_health_medicine"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_health_medicine">
                                                    Health & Medicine
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Home & Garden"
                                                    name="sector" id="sector_home_garden"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_home_garden">
                                                    Home & Garden
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox"
                                                    value="Information Technology" name="sector"
                                                    id="sector_information_technology" onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_information_technology">
                                                    Information Technology
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Food & Dining"
                                                    name="sector" id="sector_food_dining"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_food_dining">
                                                    Food & Dining
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Manufacturing"
                                                    name="sector" id="sector_manufacturing"
                                                    onclick="limitSelection(this)">
                                                <label class="form-check-label" for="sector_manufacturing">
                                                    Manufacturing
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="others_services" class="form-label labeltitle">Other Services <span
                                        class="required">*</span></label>
                                <textarea class="form-control" id="others_services" name="others_services" rows="5"
                                    placeholder="{{ $serviceupgrade->others_services }}" readonly>{{ $serviceupgrade->others_services }}</textarea>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940">Continue</button>
                    </div>
                </form> --}}


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
