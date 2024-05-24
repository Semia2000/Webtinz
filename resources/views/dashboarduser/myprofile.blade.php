@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section class="myprofileuser">
        <div class="row contentrow p-5">
            <div class="whitepage p-5">
                <h3>My profile</h3>
                <form>
                    <div class="row">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="company_name">Company Name<span class="required">*</span></label>
                                <div class="input-group position-relative">
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
                                <label for="phone">Phone<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="tel" class="form-control pr-5" id="phone"
                                        placeholder="+229 69461966">
                                    <i class="bi bi-telephone position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="country">Country<span class="required">*</span></label>
                                <select id="country" class="form-select form-select-md"
                                    aria-label=".form-select-md example">
                                    <option selected>Benin</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="state">State / Province<span class="required">*</span></label>
                                <select id="state" class="form-select  form-select-md"
                                    aria-label=".form-select-md example">
                                    <option selected>Littoral</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <h3>Update password</h3>
                    <div class="row">
                        <div class="row mt-3 mb-4 ">
                            <div class="col">
                                <label for="company_name">Old Password<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control " id="company_name" placeholder="Name">
                                    <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                            <div class="col">
                                <label for="email">New Password<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="email" class="form-control pr-5" id="email" placeholder="Email">
                                    <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="address">Confirm New Password<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="address" placeholder="Name">
                                    <i class="bi bi-geo-alt position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block"
                                style="width: 100%; border:1px solid #F05940"> Update </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
