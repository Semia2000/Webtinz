@extends('admin.adminlayout')
@section('links')
    <style>
        .feature-group {
            display: flex;
            align-items: center;
        }

        .feature-group .form-control {
            flex: 1;
        }

        .feature-group .btn-remove-feature {
            margin-left: 10px;
        }

        #btn-add-feature i {
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
                        <form action="{{ route('subscription.store') }}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="name">Status</label>
                                <select id="name" name="name" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="home">HOME BUSINESS</option>
                                    <option value="small_mid"> SMALL & MID SIZE BUSINESS</option>
                                    <option value="enterprise">ENTERPRISE</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Template Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" 
                                    required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="duration">Duration (in months)</label>
                                <select id="duration" name="duration" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="6">6 Months </option>
                                    <option value="12">12 Months</option>
                                </select>
                            </div>

                            <!-- Dynamic Features Section -->
                            <div class="form-group">
                                <label>Features</label>
                                <div id="features-wrapper">
                                    <div class="feature-group d-flex align-items-center mb-2">
                                        <input type="text" name="features[]" class="form-control me-2"
                                            placeholder="Feature">
                                        <button type="button" class="btn btn-danger btn-remove-feature">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success mt-3" id="btn-add-feature">
                                    <i class="fa fa-plus"> Add Features</i>
                                </button>
                            </div>

                            <div class="form-group">
                                <label for="setupfee">Setup Fee</label>
                                <input type="number" name="setupfee" id="setupfee" class="form-control" step="0.01"
                                    required>
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
            const featuresWrapper = document.getElementById('features-wrapper');
            const addFeatureButton = document.getElementById('btn-add-feature');

            addFeatureButton.addEventListener('click', function() {
                const featureGroup = document.createElement('div');
                featureGroup.className = 'feature-group d-flex align-items-center mb-2';
                featureGroup.innerHTML = `
            <input type="text" name="features[]" class="form-control me-2" placeholder="Feature">
            <button type="button" class="btn btn-danger btn-remove-feature">Remove</button>
        `;
                featuresWrapper.appendChild(featureGroup);

                featureGroup.querySelector('.btn-remove-feature').addEventListener('click', function() {
                    featureGroup.remove();
                });
            });

            // Attach the event listener to the existing remove button
            document.querySelectorAll('.btn-remove-feature').forEach(button => {
                button.addEventListener('click', function() {
                    button.closest('.feature-group').remove();
                });
            });
        });
    </script>
@endsection
