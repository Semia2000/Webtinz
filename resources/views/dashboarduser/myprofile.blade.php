@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section class="myprofileuser">
        <div class="row contentrow p-5">
            <div class="whitepage p-5">
                    @if ((session('Error')))
                        <div class="alert alert-danger">
                            {{ session('Error') }}
                        </div>
                    @endif
                    @if ((session('Sucess')))
                        <div class="alert alert-success">
                            {{ session('Sucess') }}
                        </div>
                    @endif
                <h3>My profile</h3>

                <form  action="{{route('myprofiles')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="company_name">Company Name<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="text" class="form-control " id="company_name" placeholder="Manaas" value="{{ $company->name }}" name="name">
                                    <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                            <div class="col">
                                <label for="email">Email Address<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="email" class="form-control pr-5" id="email"
                                        placeholder="manaas20@gmail.com" value="{{ $company->email }}" name="email">
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
                                        placeholder="746 Cotonou Benin" value="{{ $company->address }}" name="address">
                                    <i class="bi bi-geo-alt position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                            <div class="col">
                                <label for="phone">Phone<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="tel" class="form-control pr-5" id="phone"
                                        placeholder="+229 69461966" value="{{ $company->tel }}" name="tel">
                                    <i class="bi bi-telephone position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="country">Country<span class="required">*</span></label>name email address tel state
                                <select id="country" class="form-select form-select-md"
                                    aria-label=".form-select-md example" name="country">
                                    <option selected value="Benin">Benin</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="state">State / Province<span class="required">*</span></label>
                                <select id="state" class="form-select  form-select-md"
                                    aria-label=".form-select-md example" name="state">
                                    @foreach ($stateSelects as $stateSelect)
                                        <option value="{{ $stateSelect->state }}"  {{ ($stateSelect->state === $company->state) ? "selected" : "" }}>{{ $stateSelect->state }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="row mt-3 mb-4">
                            <div class="col">
                                <label for="Oldpassword">Old Password<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control " id="Oldpassword" placeholder="Old password" name="Oldpassword" autocomplete="off">
                                    <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                            <div class="col">
                                <label for="password">New Password<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="password" class="form-control pr-5" id="password" placeholder="New password" name="password">
                                    <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="Confpassword">Confirm New Password<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="Confpassword" placeholder="Confirm password" name="Confpassword">
                                    <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940"> Update </button>
                    </div>
                </form>


                {{-- <form action="" method="" enctype="multipart/form-data">
                    @csrf
                    <h3>Update password</h3>
                    <div class="row">
                        <div class="row mt-3 mb-4 ">
                            <div class="col">
                                <label for="Oldpassword">Old Password<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control " id="Oldpassword" placeholder="Old password" name="Oldpassword">
                                    <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>

                            <div class="col">
                                <label for="password">New Password<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="password" class="form-control pr-5" id="password" placeholder="New password" name="password">
                                    <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="Confpassword">Confirm New Password<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="Confpassword" placeholder="Confirm password" name="Confpassword">
                                    <i class="bi bi-lock position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" style="width: 100%; border:1px solid #F05940"> Update password </button>
                    </div>
                </form> --}}

            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
