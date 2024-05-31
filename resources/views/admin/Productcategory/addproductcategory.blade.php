@extends('admin.adminlayout')
@section('links')
    <style>
        .productcategory-group {
            display: flex;
            align-items: center;
        }

        .productcategory-group .form-control {
            flex: 1;
        }

        .productcategory-group .btn-remove-productcategory {
            margin-left: 10px;
        }

        #btn-add-productcategory i {
            font-size: 0.8em;
        }
    </style>
@endsection
@section('content')
    <section class="content">

        <div class="row">
            <div class="col p-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('productcategory.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Product Category</label>
                                <div id="productcategory-wrapper">
                                    <div class="productcategory-group d-flex align-items-center mb-2">
                                        <input type="text" name="name[]" class="form-control me-2"
                                            placeholder="Product Category">
                                        <button type="button" class="btn btn-danger btn-remove-productcategory">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success mt-3" id="btn-add-productcategory">
                                    <i class="fa fa-plus"> Add Product Category</i>
                                </button>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productcategoryWrapper = document.getElementById('productcategory-wrapper');
            const addproductcategoryButton = document.getElementById('btn-add-productcategory');

            addproductcategoryButton.addEventListener('click', function() {
                const productcategoryGroup = document.createElement('div');
                productcategoryGroup.className = 'productcategory-group d-flex align-items-center mb-2';
                productcategoryGroup.innerHTML = `
            <input type="text" name="name[]" class="form-control me-2" placeholder="productcategory">
            <button type="button" class="btn btn-danger btn-remove-productcategory">Remove</button>
        `;
                productcategoryWrapper.appendChild(productcategoryGroup);

                productcategoryGroup.querySelector('.btn-remove-productcategory').addEventListener('click', function() {
                    productcategoryGroup.remove();
                });
            });

            // Attach the event listener to the existing remove button
            document.querySelectorAll('.btn-remove-productcategory').forEach(button => {
                button.addEventListener('click', function() {
                    button.closest('.productcategory-group').remove();
                });
            });
        });
    </script>
@endsection
