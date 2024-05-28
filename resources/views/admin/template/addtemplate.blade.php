@extends('admin.adminlayout')
@section('links')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col p-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Template Type</label><br>
                                <input type="radio" name="typeservice" value="web" id="template_web" checked>
                                <label for="template_web">Web</label>
                                <input type="radio" name="typeservice" value="ecom" id="template_ecom">
                                <label for="template_ecom">Ecom</label>
                            </div>
                            <div class="form-group">
                                <label for="name">Template Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Template Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="createby">Created By</label>
                                <input type="text" id="createby" name="createby" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="access_level">Status</label>
                                <select id="access_level" name="access_level" class="form-control custom-select"
                                    onchange="togglePriceField()">
                                    <option selected disabled>Select one</option>
                                    <option value="Free">Free</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                            <div class="form-group mt-3" id="price" class="hidden">
                                <label for="price">Template Price</label>
                                <input type="number" id="price" name="price" class="form-control" >
                            </div>
                            <div class="form-group mt-3">
                                <label for="typetemplate">Template Type</label>
                                <select id="typetemplate" name="typetemplate" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="Joomla">Joomla</option>
                                    <option value="Drupal">Drupal</option>
                                    <option value="Wix">Wix</option>
                                    <option value="Squarespace">Squarespace</option>
                                    <option value="Weebly">Weebly</option>
                                    <option value="Wordpress">Wordpress</option>
                                    <option value="Bootstrap">Bootstrap</option>
                                    <option value="Shopify">Shopify</option>
                                    <option value="Magento">Magento</option>
                                    <option value="PrestaShop">PrestaShop</option>
                                </select>
                            </div>
                            <div id="ecom-fields" style="display: none;">
                                <div class="form-group mt-3">
                                    <label>Product Type</label><br>
                                    <div class="row">
                                        <div class="col">
                                            <input type="radio" name="commerce_mode" value="multi_product"
                                                id="multi_product">
                                            <label for="commerce_mode">Multi Products</label>
                                        </div>
                                        <div class="col">
                                            <input type="radio" name="commerce_mode" value="single_product"
                                                id="single_product">
                                            <label for="commerce_mode">Single Product</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-goup mt-3">
                                    <label for="productcategory">Product Category</label>
                                    <div class="row ">
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Automotive"
                                                    name="productcategory[]" id="sector_automotive">
                                                <label class="form-check-label" for="sector_automotive">
                                                    Automotive
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Business Support"
                                                    name="productcategory[]" id="sector_business_support">
                                                <label class="form-check-label" for="sector_business_support">
                                                    Business Support
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Computers"
                                                    name="productcategory[]" id="sector_computers">
                                                <label class="form-check-label" for="sector_computers">
                                                    Computers
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Entertainment"
                                                    name="productcategory[]" id="sector_entertainment">
                                                <label class="form-check-label" for="sector_entertainment">
                                                    Entertainment
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Education"
                                                    name="productcategory[]" id="sector_education">
                                                <label class="form-check-label" for="sector_education">
                                                    Education
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Real Estate"
                                                    name="productcategory[]" id="sector_real_estate">
                                                <label class="form-check-label" for="sector_real_estate">
                                                    Real Estate
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Travels"
                                                    name="productcategory[]" id="sector_travels">
                                                <label class="form-check-label" for="sector_travels">
                                                    Travels
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Others"
                                                    name="productcategory[]" id="sector_others">
                                                <label class="form-check-label" for="sector_others">
                                                    Others
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Retail"
                                                    name="productcategory[]" id="sector_retail">
                                                <label class="form-check-label" for="sector_retail">
                                                    Retail
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Personal Care"
                                                    name="productcategory[]" id="sector_personal_care">
                                                <label class="form-check-label" for="sector_personal_care">
                                                    Personal Care
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Health & Medicine"
                                                    name="productcategory[]" id="sector_health_medicine">
                                                <label class="form-check-label" for="sector_health_medicine">
                                                    Health & Medicine
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Home & Garden"
                                                    name="productcategory[]" id="sector_home_garden">
                                                <label class="form-check-label" for="sector_home_garden">
                                                    Home & Garden
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox"
                                                    value="Information Technology" name="productcategory[]"
                                                    id="sector_information_technology">
                                                <label class="form-check-label" for="sector_information_technology">
                                                    Information Technology
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Food & Dining"
                                                    name="productcategory[]" id="sector_food_dining">
                                                <label class="form-check-label" for="sector_food_dining">
                                                    Food & Dining
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Manufacturing"
                                                    name="productcategory[]" id="sector_manufacturing">
                                                <label class="form-check-label" for="sector_manufacturing">
                                                    Manufacturing
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="businessector">
                                <div class="form-goup mt-3">
                                    <label for="industrie">Business Sector</label>
                                    <div class="row ">
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Automotive"
                                                    name="industrie[]" id="sector_automotive">
                                                <label class="form-check-label" for="sector_automotive">
                                                    Automotive
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Business Support"
                                                    name="industrie[]" id="sector_business_support">
                                                <label class="form-check-label" for="sector_business_support">
                                                    Business Support
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Computers"
                                                    name="industrie[]" id="sector_computers">
                                                <label class="form-check-label" for="sector_computers">
                                                    Computers
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Entertainment"
                                                    name="industrie[]" id="sector_entertainment">
                                                <label class="form-check-label" for="sector_entertainment">
                                                    Entertainment
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Education"
                                                    name="industrie[]" id="sector_education">
                                                <label class="form-check-label" for="sector_education">
                                                    Education
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Real Estate"
                                                    name="industrie[]" id="sector_real_estate">
                                                <label class="form-check-label" for="sector_real_estate">
                                                    Real Estate
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Travels"
                                                    name="industrie[]" id="sector_travels">
                                                <label class="form-check-label" for="sector_travels">
                                                    Travels
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Others"
                                                    name="industrie[]" id="sector_others">
                                                <label class="form-check-label" for="sector_others">
                                                    Others
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Retail"
                                                    name="industrie[]" id="sector_retail">
                                                <label class="form-check-label" for="sector_retail">
                                                    Retail
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Personal Care"
                                                    name="industrie[]" id="sector_personal_care">
                                                <label class="form-check-label" for="sector_personal_care">
                                                    Personal Care
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Health & Medicine"
                                                    name="industrie[]" id="sector_health_medicine">
                                                <label class="form-check-label" for="sector_health_medicine">
                                                    Health & Medicine
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Home & Garden"
                                                    name="industrie[]" id="sector_home_garden">
                                                <label class="form-check-label" for="sector_home_garden">
                                                    Home & Garden
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox"
                                                    value="Information Technology" name="industrie[]"
                                                    id="sector_information_technology">
                                                <label class="form-check-label" for="sector_information_technology">
                                                    Information Technology
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Food & Dining"
                                                    name="industrie[]" id="sector_food_dining">
                                                <label class="form-check-label" for="sector_food_dining">
                                                    Food & Dining
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Manufacturing"
                                                    name="industrie[]" id="sector_manufacturing">
                                                <label class="form-check-label" for="sector_manufacturing">
                                                    Manufacturing
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="thumbnail">Template Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="zip_file">Template ZIP File</label>
                                <input type="file" name="zip_file" class="form-control" accept=".zip" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Template</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row p-5 pt-0">
            <input type="submit" value="Upload Template" class="btn btn-success">
        </div> --}}
    </section>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const templateWeb = document.getElementById('template_web');
            const templateEcom = document.getElementById('template_ecom');
            const ecomFields = document.getElementById('ecom-fields');
            const businessectorField = document.getElementById('businessector')

            templateWeb.addEventListener('change', function() {
                if (this.checked) {
                    ecomFields.style.display = 'none';
                }
            });

            templateEcom.addEventListener('change', function() {
                if (this.checked) {
                    ecomFields.style.display = 'block';
                    businessectorField.style.display = 'none';
                }
            });
        });
    </script>
    <script>
        function togglePriceField() {
            const accessLevel = document.getElementById('access_level').value;
            const priceField = document.getElementById('price');
            if (accessLevel === 'Paid') {
                priceField.classList.remove('hidden');
            } else {
                priceField.classList.add('hidden');
            }
        }
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const multiProductRadio = document.getElementById('multi_product');
        const singleProductRadio = document.getElementById('single_product');
        const checkboxes = document.querySelectorAll('input[name="productcategory[]"]');

        function updateCheckboxes() {
            if (singleProductRadio.checked) {
                // Uncheck all checkboxes when switching to Single Product
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                    checkbox.disabled = false;
                    checkbox.addEventListener('change', handleSingleProductSelection);
                });
            } else {
                // Remove event listeners and enable all checkboxes for Multi Product
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
        
        // Initial call to set up correct state
        updateCheckboxes();
    });
</script>
@endsection