@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
    <section class="contactinf flex-column d-flex justify-content-center align-items-center">
        <div class="text-center mt-5 mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="contactback">
            <div class="row">
                <div class="text-left">
                    <h2>Request for a free consultation</h2>
                    <p>Provide company contact information
                    </p>
                </div>

                <form method="POST" action="{{ route('custumform.store') }}">
                    @csrf
                    <div class="row mt-3 mb-4 ">
                        <div class="col">
                            <label for="name">Company Name<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" value="{{ Auth::user()->company->name }}" required autocomplete="email"
                                    placeholder="email" readonly>
                                <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>

                        <div class="col">
                            <label for="email">Email Address<span class="required">*</span></label>
                            <div class="input-group position-relative">
                                <input class="form-control  @error('email') is-invalid @enderror" name="email"
                                    value="{{ Auth::user()->company->email }}" required autocomplete="email"
                                    placeholder="email" readonly>
                                <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                    style="pointer-events: none;"></i>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="row mb-4 ">
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
                    </div> --}}

                    <div class="row mb-4 ">
                        <div class="col">
                            <label for="name">Subject Request<span class="required">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Subject Request">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="typerequest">Type Request<span class="required">*</span></label>
                            <select id="typerequest" name="typerequest" class="form-select  form-select-md"
                                aria-label=".form-select-md example">
                                <option value="completeanalyse" selected>Analyse Complete</option>
                                <option value="partielleanalyse">Analyse Partielle</option>
                            </select>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="request" class="form-label labeltitle">Request<span
                                class="required">*</span></label>
                        <textarea class="form-control @error('request') is-invalid @enderror" name="request" value="{{ old('request') }}"
                            required autocomplete="request" placeholder="Your request" rows="5"></textarea>
                        @error('request')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" style="width: 100%; border:1px solid #F05940">
                            {{ __('Send Request') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
