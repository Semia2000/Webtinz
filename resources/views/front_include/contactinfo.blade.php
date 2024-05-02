@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="contactinf flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-5  mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="contactback">
            <div class="row">
                <h2>Company Contact Info</h2>
                <p>Provide company contact information
                </p>
                <form>
                    <div class="row mt-3 mb-4 ">
                        <div class="col">
                            <label for="company_name">Company Name<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control " id="company_name" placeholder="Name">
                                <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>

                        <div class="col">
                            <label for="email">Email Address<span class="required">*</span></label>
                            <div class="input-group position-relative">
                                <input type="email" class="form-control pr-5" id="email" placeholder="Email">
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-4 ">
                        <div class="col">
                            <label for="address">Street Address<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="address" placeholder="Name">
                                <i class="bi bi-geo-alt position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <label for="country">Country<span class="required">*</span></label>
                            <select id="country" class="form-select form-select-md" aria-label=".form-select-md example">
                                <option>...</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4 ">
                        <div class="col">
                            <label for="state">State / Province<span class="required">*</span></label>
                            <select id="state" class="form-select  form-select-md" aria-label=".form-select-md example">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="phone">Phone<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="tel" class="form-control pr-5" id="phone" placeholder="Phone No">
                                <i class="bi bi-telephone position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" style="width: 100%; border:1px solid #F05940">
                            Continue </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
