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
                <h2>Summary </h2>
                <p>Check your complete information whatever you have shared
                </p>
                <hr class="mt-5 mb-2">
                <h6>Company Contact Info &nbsp;&nbsp;<span><i class="bi bi-pencil"></i></span> </h6>
                <form>
                    <div class="row">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="company_name">Company Name<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control " id="company_name" placeholder="Manaas">
                                    <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                            <div class="col">
                                <label for="email">Email Address<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="email" class="form-control pr-5" id="email"
                                        placeholder="manaas20@gmail.com">
                                    <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="address">Street Address<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="address"
                                        placeholder="746 Cotonou Benin">
                                    <i class="bi bi-geo-alt position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                            <div class="col">
                                <label for="country">Country<span class="required">*</span></label>
                                <select id="country" class="form-select form-select-md"
                                    aria-label=".form-select-md example">
                                    <option selected>Benin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="state">State / Province<span class="required">*</span></label>
                                <select id="state" class="form-select  form-select-md"
                                    aria-label=".form-select-md example">
                                    <option selected>Littoral</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="phone">Phone<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="tel" class="form-control pr-5" id="phone"
                                        placeholder="+229 69461966">
                                    <i class="bi bi-telephone position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr class="mt-5 mb-2">
                    <h6>Company Info &nbsp;&nbsp;<span><i class="bi bi-pencil"></i></span> </h6>
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label labeltitle">Company Information
                                <span class="required">*</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                                placeholder="Netzila Technologies is a leading eCommerce, designing, marketing and web development company where creativity joins hands with the supremacy of high-end technology that reflects on the progress of our clients."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label labeltitle">Products or
                                services<span class="required">*</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                                placeholder="Our team of experts provides a wide range of services to help you grow your business, including IT support, E-commerce Web Development, Custom Website Redesign, Digital Marketing and Shopify Theme Development for businesses of all sizes."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label labeltitle">Select Business
                                Sector<span class="required">*</span></label>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Default radio
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Default checked radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Automotive
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Business Support
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Computers
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Entertainment
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Education
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label labeltitle">Other Services
                                <span class="required">*</span></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                                placeholder="Our team of experts provides a wide range of services to help you grow your business, including IT support, E-commerce Web Development, Custom Website Redesign, Digital Marketing and Shopify Theme Development for businesses of all sizes."></textarea>
                        </div>
                    </div>




                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940"> Continue </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
