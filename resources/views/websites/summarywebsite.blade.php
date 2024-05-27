@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="contactinf flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-5  mb-5">
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
                <h6 class="mt-4 mb-4">Company Contact Info &nbsp;&nbsp;<span><i class="bi bi-pencil edit-icon" data-target="contact-info"></i></span></h6>

                <form method="POST" action="{{ route('updateSummary', ['companyId' => $companyinfo->first()->id, 'websiteId' => $websites->id]) }}">
                    @csrf
                
                    <input type="hidden" name="website_id" value="{{ $websites->id }}">
                    @if($companyinfo)
                        <input type="hidden" name="company_id" value="{{ $companyinfo->first()->id }}">
                        <div class="row" id="contact-info">
                            <!-- Champ Company Name -->
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="company_name">Company Name<span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="company_name" name="name" value="{{ $companyinfo->first()->name }}" placeholder="Company Name" readonly>
                                        <i class="bi bi-person-circle position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>
                
                                <!-- Champ Email -->
                                <div class="col">
                                    <label for="email">Email Address<span class="required">*</span></label>
                                    <div class="input-group position-relative">
                                        <input type="email" class="form-control pr-5" id="email" name="email" value="{{ $companyinfo->first()->email }}" placeholder="Email Address" readonly>
                                        <i class="bi bi-envelope position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Champ Address -->
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="address">Street Address<span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $companyinfo->first()->address }}" placeholder="Street Address" readonly>
                                        <i class="bi bi-geo-alt position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>
                
                                <!-- Champ Country -->
                                <div class="col">
                                    <label for="country">Country<span class="required">*</span></label>
                                    <select id="country" class="form-select form-select-md" name="country" value="{{ old('country', $companyinfo->first()->country) }}" disabled>
                                        <option selected>Benin</option>
                                    </select>
                                    <input type="hidden" name="country" value="{{ $companyinfo->first()->country }}">
                                </div>
                            </div>
                
                            <!-- Champ State -->
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="state">State / Province<span class="required">*</span></label>
                                    <select id="state" class="form-select form-select-md" name="state" value="{{ old('state', $companyinfo->first()->state) }}" disabled>
                                        <option selected>Littoral</option>
                                    </select>
                                    <input type="hidden" name="state" value="{{ $companyinfo->first()->state }}">
                                </div>
                
                                <!-- Champ Phone -->
                                <div class="col">
                                    <label for="phone">Phone<span class="required">*</span></label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control pr-5" id="phone" name="tel" value="{{ $companyinfo->first()->tel }}" placeholder="Phone" readonly>
                                        <i class="bi bi-telephone position-absolute top-50 end-0 me-2 translate-middle-y"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                
                    <hr class="mt-5 mb-2">
                    <h6 class="mt-4 mb-4">Company Info &nbsp;&nbsp;<span><i class="bi bi-pencil edit-icon" data-target="company-info"></i></span></h6>
                
                    @if ($websites)
                        <div class="row" id="company-info">
                            <div class="mb-3">
                                <label for="description" class="form-label labeltitle">Company Information <span class="required">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="{{ $websites->description }}" readonly>{{ $websites->description }}</textarea>
                            </div>
                
                            <div class="mb-3">
                                <label for="products_services" class="form-label labeltitle">Products or services<span class="required">*</span></label>
                                <textarea class="form-control" id="products_services" name="products_services" rows="5" placeholder="{{ $websites->products_services }}" readonly>{{ $websites->products_services }}</textarea>
                            </div>
                
                            <div class="mb-3">
                                <label for="sector" class="form-label labeltitle">Select Business Sector<span class="required">*</span></label>
                                <div class="row">
                                    <div class="col mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $websites->sector }}" name="sector" id="sector_{{ $websites->sector }}" checked disabled>
                                            <label class="form-check-label" for="sector_{{ $websites->sector }}">
                                                {{ $websites->sector }}
                                            </label>
                                            <input type="hidden" name="sector" value="{{ $companyinfo->first()->sector }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <div class="mb-3">
                                <label for="others_services" class="form-label labeltitle">Other Services <span class="required">*</span></label>
                                <textarea class="form-control" id="others_services" name="others_services" rows="5" placeholder="{{ $websites->others_services }}" readonly>{{ $websites->others_services }}</textarea>
                            </div>
                        </div>
                    @endif
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" style="width: 100%; border:1px solid #F05940">Continue</button>
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
                });
            }
        });
    });
</script>
@endsection
