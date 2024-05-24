@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="contactinf flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-4 mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="contactback">
            <div class="row">

                <div class="text-center">
                    <h2>Personnel information</h2>
                    <p>Provide company contact information
                    </p>
                </div>

                <form method="POST" action="{{ route('storecontactinfo') }}">
                    @csrf
                    <input type="hidden" name="selected_service" value="{{ $selectedService }}">

                    <div class="row mt-3 mb-4 ">
                        <div class="col">
                            <label for="firstname">First Name<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname"
                                    placeholder="First name">
                                <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <label for="lastname">Last name<span class="required">*</span></label>
                            <div class="input-group position-relative">
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname"
                                    placeholder="Last name">
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-4 ">
                        <div class="col">
                            <label for="address">Email Address<span class="required">*</span></label>
                            <div class="input-group position-relative">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ Auth::user()->email }}" required autocomplete="email" placeholder="email"
                                    readonly>
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <label for="tel">Phone<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel"
                                    value="{{ old('tel') }}" required autocomplete="tel" placeholder="Phone No">
                                <i class="bi bi-telephone position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="text-center mt-5 mb-4">
                        <h2>Company Contact Info</h2>
                        <p>Provide company contact information
                        </p>
                    </div>

                    <div class="row mt-3 mb-4 ">
                        <div class="col">
                            <label for="name">Company Name<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Company Name">
                                <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <label for="email">Email Address<span class="required">*</span></label>
                            <div class="input-group position-relative">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Email Address">
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row mb-4 ">
                        <div class="col">
                            <label for="address">Street Address<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address"
                                    placeholder="street Address">
                                <i class="bi bi-geo-alt position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="tel">Phone<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="tel" class="form-control @error('tel') is-invalid @enderror"
                                    name="tel" value="{{ old('tel') }}" required autocomplete="tel"
                                    placeholder="Phone No">
                                <i class="bi bi-telephone position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row mb-4 ">
                        <div class="col">
                            <label for="country">Country<span class="required">*</span></label>
                            <select id="country" name="country" class="form-select form-select-md"
                                aria-label=".form-select-md example">
                                <option value="" selected>Select Country</option>
                                <option value="benin">Benin</option>
                                <option value="togo">Togo</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="state">State / Province<span class="required">*</span></label>
                            <select id="state" name="state" class="form-select  form-select-md"
                                aria-label=".form-select-md example">
                                <option selected>Select State</option>
                                <option value="Cotonou"></option>
                                <option value="ketou">Ketou</option>
                            </select>
                        </div>

                    </div>

                    <div class="row mb-4 ">
                        <div class="col">
                            <label for="sector">sector<span class="required">*</span></label>
                            <select id="sector" name="sector" class="form-select form-select-md"
                                aria-label=".form-select-md example">
                                <option value="" selected>Select Your Industrie</option>
                                <option value="Agro">Agonomie</option>
                                <option value="tech">Technologie</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="nbr_employes">Number of Employes<span class="required">*</span></label>
                            <select id="nbr_employes" name="nbr_employes" class="form-select  form-select-md"
                                aria-label=".form-select-md example">
                                <option selected>Number of Employes</option>
                                <option value="1">1 - 10</option>
                                <option value="2">11 - 50</option>
                            </select>
                        </div>

                    </div>

                    <div class="mb-4 ">
                        <label for="chiffre_affaire">Sales Figures<span class="required">*</span></label>
                        <select id="chiffre_affaire" name="chiffre_affaire" class="form-select  form-select-md"
                            aria-label=".form-select-md example">
                            <option selected>Sales Figures</option>
                            <option value="1">100 $ - 1000 $</option>
                            <option value="2">1000 $ - 5000 $</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label labeltitle"> Description
                            <span class="required">*</span></label>
                        <textarea class="form-control" id="description" rows="5"
                            placeholder="A short description of your company" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block"
                            style="width: 100%; border:1px solid #F05940">
                            {{ __('Continue') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
