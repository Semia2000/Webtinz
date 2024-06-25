@extends('admin.adminlayout')
@section('links')
<style>
    .hidden {
        display: none;
    }
</style>
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
                        <form action="{{ route('templates.update', $template->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Template Type</label><br>
                                <input type="radio" name="typeservice" value="web" id="template_web"
                                    {{ $template->typeservice == 'web' ? 'checked' : '' }}>
                                <label for="template_web">Web Site</label>
                                <input type="radio" name="typeservice" value="ecom" id="template_ecom"
                                    {{ $template->typeservice == 'ecom' ? 'checked' : '' }}>
                                <label for="template_ecom">Ecommerce</label>
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Template Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $template->name }}" required>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Template Description</label>
                                <textarea name="description" class="form-control">{{ $template->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="createby">Created By</label>
                                <input type="text" id="createby" name="createby" value="{{ $template->createby }}"
                                    class="form-control" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="access_level">Status</label>
                                <select id="access_level" name="access_level" class="form-control custom-select"
                                    onchange="togglePriceField()">
                                    <option disabled>Select one</option>
                                    <option value="Free" {{ $template->access_level == 'Free' ? 'selected' : '' }}>Free
                                    </option>
                                    <option value="Paid" {{ $template->access_level == 'Paid' ? 'selected' : '' }}>Paid
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mt-3" id="price" class="hidden">
                                <label for="price">Template Price</label>
                                <input type="number" id="price" name="price" value="{{ $template->price }}"
                                    class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="typetemplate">Template Type</label>
                                <select id="typetemplate" name="typetemplate" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($typetemplates as $typetemplate)
                                    <option value="{{ $typetemplate->name }}" {{ $template->typetemplate == $typetemplate->name ? 'selected' : '' }}>{{ $typetemplate->name }}</option>

                                @endforeach
                                </select>
                            </div>

                            <div id="ecom-fields" style="display: none;">
                                <div class="form-group">
                                    <label>Product Type</label><br>
                                    <input type="radio" name="commerce_mode" value="multi_product" id="multi_product"
                                        {{ $template->commerce_mode == 'multi_product' ? 'checked' : '' }}>
                                    <label for="commerce_mode">Multi Products</label>
                                    <input type="radio" name="commerce_mode" value="single_product" id="single_product"
                                        {{ $template->commerce_mode == 'single_product' ? 'checked' : '' }}>
                                    <label for="commerce_mode">Single Product</label>
                                </div>
                                <div class="form-goup mt-3">
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
                            <div id="businessector">
                                <div class="form-goup mt-3">
                                    <label for="industrie">Business Sector</label>
                                    <div class="row ">
                                        @php
                                            $chunks = $sectorsbusiness->chunk(5); // Divise les catégories en groupes de 5
                                        @endphp
                                        @foreach ($chunks as $chunk)
                                            <div class="col">
                                                @foreach ($chunk as $sectorbusiness)
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $sectorbusiness->name }}" name="industrie[]"
                                                            id="{{ $sectorbusiness->name }}">
                                                        <label class="form-check-label"
                                                            for="{{ $sectorbusiness->name }}">
                                                            {{ $sectorbusiness->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Template Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="zip_file">Template ZIP File</label>
                                <input type="file" name="zip_file" value="" class="form-control"
                                    accept=".zip">
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
        const businessectorField = document.getElementById('businessector');

        templateWeb.addEventListener('change', function() {
            if (this.checked) {
                ecomFields.style.display = 'none';
                businessectorField.style.display = 'block'; // Ensure businessector is visible when web is selected
            }
        });

        templateEcom.addEventListener('change', function() {
            if (this.checked) {
                ecomFields.style.display = 'block';
                businessectorField.style.display = 'none'; // Ensure businessector is hidden when ecom is selected
            }
        });

        // Trigger the change event to initialize the correct display state
        if (templateWeb.checked) {
            templateWeb.dispatchEvent(new Event('change'));
        } else if (templateEcom.checked) {
            templateEcom.dispatchEvent(new Event('change'));
        }
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
    document.addEventListener('DOMContentLoaded', function() {
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
