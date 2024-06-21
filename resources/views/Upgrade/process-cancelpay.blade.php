@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
<section class=" d-flex flex-column justify-content-center align-items-center">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="text-center mt-3 mb-3">
        <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
    </div>
    <div class="processpay d-flex flex-column justify-content-center align-items-center pt-5 mb-5" style="background-color:white;">
        <input type="hidden" value="{{ $serviceupgrade->id }}">
        <div class="row row-cols-1 row-cols-md-2 pb-3">
            <div class="col-4">
                <h4>Your subscription Summary</h4>
                <p>See your subscriptions details</p>
                <div class="card mb-3">
                    <div class="card-body">
                        <h3>Penalty Fee</h3>
                        <h2>
                            FCFA
                            {{ $serviceupgrade->subscription && $serviceupgrade->template
                                ? $serviceupgrade->subscription->price + $serviceupgrade->template->price + $serviceupgrade->subscription->setupfee
                                : 'N/A' }}
                        </h2>
                    </div>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I accept <span style="color:#F05940 ">terms of use</span> & <span style="color:#F05940 ">Policy</span>
                    </label>
                </div>
            </div>
            <div class="col-8 d-flex align-items-center justify-content-center">
                <div class="radiochoice d-flex flex-column justify-content-center">
                    <p>Select your payment options</p>
                    <div class="radiocheck mb-3">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="paypal">
                        <label class="form-check-label" for="radio1">
                            <img width="80" height="30" src="{{ asset('assets/images/paypal.png') }}" alt="">
                        </label>
                    </div>
                    <div class="radiocheck mb-3">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="mobilemoney">
                        <label class="form-check-label" for="radio2">
                            <div class="d-flex justify-content-center align-items-center" style="background-color:#FECC00; width:80px;height:40px">
                                <img width="50" height="30" src="{{ asset('assets/images/image 58.png') }}" alt="">
                            </div>
                        </label>
                    </div>
                    <div class="radiocheck mb-3">
                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="card">
                        <label class="form-check-label" for="radio3">
                            <div class="d-flex justify-content-center align-items-center" style="background-color:#1E3C71; width:80px;height:40px">
                                <img width="50" height="30" src="{{ asset('assets/images/image 59.png') }}" alt="">
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="mobileMoneyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mobile Money Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="mobileMoneyForm" action="{{ route('processMobileMoneyPaymentForupgrade') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                            <small style="color:#F05940">phone number must include country code. E.g. 229XXXXXXXX</small>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="Benin">Benin</option>
                                <option value="Togo">Togo</option>
                                <option value="Mali">Mali</option>
                            </select>
                        </div>
                        <input type="hidden" id="totalPrice" name="totalPrice"
                            value="{{ $serviceupgrade->subscription && $serviceupgrade->template
                                ? $serviceupgrade->subscription->price + $serviceupgrade->template->price + $serviceupgrade->subscription->setupfee
                                : '0' }}">
                        <input type="hidden" name="plan_id" value="{{ $serviceupgrade->subscription->id }}" id="selected-plan-id">
                        <input type="hidden" value="{{ $serviceupgrade->id }}" name="upgrade_id">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- PayPal Payment Form -->
    <form id="paypalForm" action="{{ route('processPaypalPayment') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="totalPrice" value="{{ $serviceupgrade->subscription && $serviceupgrade->template ? $serviceupgrade->subscription->price + $serviceupgrade->template->price + $serviceupgrade->subscription->setupfee : '0' }}">
        <input type="hidden" name="plan_id" value="{{ $serviceupgrade->subscription->id }}">
        <input type="hidden" value="{{ $serviceupgrade->id }}" name="upgrade_id">
    </form>
</section>
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMoneyOption = document.getElementById('radio2');
        const mobileMoneyModal = new bootstrap.Modal(document.getElementById('mobileMoneyModal'), {});
        const paypalOption = document.getElementById('radio1');
        const paypalForm = document.getElementById('paypalForm');

        mobileMoneyOption.addEventListener('change', function() {
            if (mobileMoneyOption.checked) {
                mobileMoneyModal.show();
            }
        });

        paypalOption.addEventListener('change', function() {
            if (paypalOption.checked) {
                paypalForm.submit();
            }
        });
    });
</script>
@endsection
