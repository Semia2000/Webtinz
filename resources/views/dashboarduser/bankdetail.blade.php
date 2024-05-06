@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section class="bankdetails">
        <div class="row bankdetail  p-5">
            <div class="processtopay whitepage p-5">
                <div class="row bigdiv row-cols-1 row-cols-md-2 ">
                    <div class="col col1 ">
                        <h4>Payment Method</h4>
                        <div class="radiochoice d-flex  flex-column justify-content-center">
                            <p>Select your payment options</p>
                            <div class="radiocheck d-flex align-items-center mb-3" checked
                                style="background-color:#FEC446;width:100%">
                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1"
                                    checked>
                                <label class="form-check-label" for="radio1">
                                    <img width="80" height="30" src="{{ asset('assets/images/paypal.png') }}"
                                        alt="">
                                </label>
                            </div>
                            <div class="radiocheck d-flex align-items-center mb-3"  style="background-color:#FECC00
                                ">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                    value="option2">
                                <label class="form-check-label" for="radio2">
                                    <img width="80" height="30" src="{{ asset('assets/images/image 58.png') }}"
                                        alt="">
                                </label>
                            </div>
                            <div class="radiocheck d-flex align-items-center mb-3"
                                style="background-color:#1E3C71
                                ">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio"
                                    value="option3">
                                <label class="form-check-label" for="radio3">
                                    <img width="50" height="30" src="{{ asset('assets/images/image 59.png') }}"
                                        alt="">
                                </label>
                            </div>
                            <div class="radiocheck d-flex align-items-center mb-3" checked
                                style="background-color:#F05940;width:100%; padding:10px 0px">
                                <input type="radio" class="ms-1 form-check-input" id="radio1" name="optradio"
                                    value="option1" checked>
                                <label class="form-check-label" for="radio1" style="color: white;font-weight:500">Local
                                    bank
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col col2">
                        <h4>Bank detail</h4>
                        <form>
                            <div class="row  mb-4 ">
                                <div class="col">
                                    <label for="company_name">Company Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="company_name" placeholder="Name">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="email">Email Address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control pr-5" id="email" placeholder="Email">
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-4 ">
                                <div class="col">
                                    <label for="address">Street Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="address" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="email">Email Address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control pr-5" id="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4 ">
                                <div class="col">
                                    <label for="email">Email Address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control pr-5" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control pr-5" id="phone"
                                            placeholder="Phone No">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4 ">
                                <div class="col">
                                    <label for="state">State / Province</label>
                                    <select id="state" class="form-select  form-select-md"
                                        aria-label=".form-select-md example">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control pr-5" id="phone"
                                            placeholder="Phone No">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 ">
                                <div class="col">
                                    <label for="email">Email Address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control pr-5" id="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control pr-5" id="phone"
                                            placeholder="Phone No">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
                <div class="row totalsolde mt-5">
                    <div class="col-4 colum">
                        <H3>Total Earning</H3>
                        <h3 style="color: #F05940 ">FCFA 5000</h3>
                        <h3>FCFA 6000000</h3>
                    </div>
                    <div class="col-8 colum">
                        <div class="text-left">
                            <h3>Balance Breakdown</h3>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="option1" checked>
                                <label class="form-check-label" for="inlineRadio1">commision</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">other</label>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
