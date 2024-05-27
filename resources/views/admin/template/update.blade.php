@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="content">
        <div class="row">
            <div class="col p-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('templates.update', $template->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Template Type</label><br>
                                <input type="radio" name="typeservice" value="web" id="template_web" {{ $template->typeservice == 'web' ? 'checked' : '' }}>
                                <label for="template_web">Web</label>
                                <input type="radio" name="typeservice" value="ecom" id="template_ecom">
                                <label for="template_ecom" {{ $template->typeservice == 'ecom' ? 'checked' : '' }}>Ecom</label>
                            </div>
                            <div class="form-group">
                                <label for="name">Template Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $template->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Template Description</label>
                                <textarea name="description" class="form-control">{{ $template->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="access_level">Status</label>
                                <select id="access_level" name="access_level" class="form-control custom-select">
                                    <option disabled>Select one</option>
                                    <option value="Free" {{ $template->access_level == 'Free' ? 'selected' : '' }}>Free</option>
                                    <option value="Paid" {{ $template->access_level == 'Payed' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                            <div id="ecom-fields" style="display: none;">
                                <div class="form-group">
                                    <label>Product Type</label><br>
                                    <input type="radio" name="commerce_mode" value="multi_product" id="commerce_mode" {{ $template->commerce_mode == 'multi_product' ? 'checked' : '' }}>
                                    <label for="commerce_mode" >Multi Products</label>
                                    <input type="radio" name="commerce_mode" value="single_product" id="commerce_mode" {{ $template->commerce_mode == 'single_product' ? 'checked' : '' }} >
                                    <label for="commerce_mode">Single Product</label>
                                </div>
                            </div>
                            <div class="form-goup">
                                <div class="row ">
                                    <div class="col">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Automotive" name="industrie[]" id="sector_automotive"
                                            @if(in_array('Automotive', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_automotive">Automotive</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Business Support" name="industrie[]" id="sector_business_support"
                                            @if(in_array('Business Support', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_business_support">Business Support</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Computers" name="industrie[]" id="sector_computers"
                                            @if(in_array('Computers', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_computers">Computers</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Entertainment" name="industrie[]" id="sector_entertainment"
                                            @if(in_array('Entertainment', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_entertainment">Entertainment</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Education" name="industrie[]" id="sector_education"
                                            @if(in_array('Education', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_education">Education</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Real Estate" name="industrie[]" id="sector_real_estate"
                                            @if(in_array('Real Estate', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_real_estate">Real Estate</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Travels" name="industrie[]" id="sector_travels"
                                            @if(in_array('Travels', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_travels">Travels</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Others" name="industrie[]" id="sector_others"
                                            @if(in_array('Others', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_others">Others</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Retail" name="industrie[]" id="sector_retail"
                                            @if(in_array('Retail', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_retail">Retail</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Personal Care" name="industrie[]" id="sector_personal_care"
                                            @if(in_array('Personal Care', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_personal_care">Personal Care</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Health & Medicine" name="industrie[]" id="sector_health_medicine"
                                            @if(in_array('Health & Medicine', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_health_medicine">Health & Medicine</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Home & Garden" name="industrie[]" id="sector_home_garden"
                                            @if(in_array('Home & Garden', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_home_garden">Home & Garden</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Information Technology" name="industrie[]" id="sector_information_technology"
                                            @if(in_array('Information Technology', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_information_technology">Information Technology</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Food & Dining" name="industrie[]" id="sector_food_dining"
                                            @if(in_array('Food & Dining', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_food_dining">Food & Dining</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="Manufacturing" name="industrie[]" id="sector_manufacturing"
                                            @if(in_array('Manufacturing', $selectedIndustries)) checked @endif>
                                            <label class="form-check-label" for="sector_manufacturing">Manufacturing</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="thumbnail">Template Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="zip_file">Template ZIP File</label>
                        <input type="file" name="zip_file" value="" class="form-control" accept=".zip">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Template</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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

            templateWeb.addEventListener('change', function() {
                if (this.checked) {
                    ecomFields.style.display = 'none';
                }
            });

            templateEcom.addEventListener('change', function() {
                if (this.checked) {
                    ecomFields.style.display = 'block';
                }
            });
        });
    </script>
@endsection
