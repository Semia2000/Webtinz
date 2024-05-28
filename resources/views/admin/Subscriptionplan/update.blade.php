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
                        <form action="{{ route('subscription.update', $subscriptionplan->id) }}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="name">Status</label>
                                <select id="name" name="name" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="home" {{ $subscriptionplan->name == 'home' ? 'selected' : '' }}>HOME BUSINESS</option>
                                    <option value="small_mid" {{ $subscriptionplan->name == 'small_mid' ? 'selected' : '' }}> SMALL & MID SIZE BUSINESS</option>
                                    <option value="enterprise" {{ $subscriptionplan->name == 'enterprise' ? 'selected' : '' }}> ENTERPRISE</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Template Description</label>
                                <textarea name="description" class="form-control">{{ $subscriptionplan->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{ $subscriptionplan->price }}" step="0.01" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="duration">Duration (in months)</label>
                                <select id="duration" name="duration" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="6" {{ $subscriptionplan->duration == 6 ? 'selected' : '' }}>6 Months </option>
                                    <option value="12" {{ $subscriptionplan->duration == 12 ? 'selected' : '' }}>12 Months</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="setupfee">Setup Fee</label>
                                <input type="number" name="setupfee" id="setupfee" value="{{ $subscriptionplan->setupfee }}" class="form-control" step="0.01"
                                    required>
                            </div>

                            <!-- Dynamic Features Section -->
                            <div class="form-group">
                                <label>Features</label>
                                <div id="features-wrapper">
                                    @foreach($subscriptionplan->features as $feature)
                                        <div class="feature-group">
                                            <input type="text" name="features[]" class="form-control mb-2" value="{{ $feature }}" placeholder="Feature">
                                            <button type="button" class="btn btn-danger btn-remove-feature">Remove</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-success mt-2" id="btn-add-feature">Add Feature</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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
