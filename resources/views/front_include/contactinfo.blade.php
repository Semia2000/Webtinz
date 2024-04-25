@extends('layouts_app.cloudlayout')
@section('links')
@endsection
@section('content')
<section class="signup">
    <div class="row" style="background-color: white;">

        <h2>Company Contact Info</h2>
        <p>Provide company contact information
        </p>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email<span class="required">*</span></label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password  <span class="required">*</span></label>
                    <div class="input-group">
                        <input type="password" class="form-control " id="inputPassword4" placeholder="Password">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email  <span class="required">*</span></label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password <span class="required">*</span></label>
                    <div class="input-group">
                        <input type="password" class="form-control " id="inputPassword4" placeholder="Password">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email  <span class="required">*</span></label>
                    <div class="input-group">
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password <span class="required">*</span></label>
                    <div class="input-group">
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block"> Continue </button>
            </div>
            <div class="d-flex">
                <p>Didn't receive an OTP?</p>
                <a class="ms-auto" href="">Resend</a>
            </div>
        </form>

    </div>
</section>
@endsection
@section('js')
@endsection
