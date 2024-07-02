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


                    {{-- Divion for Personals information  --}}
                        <hr>
                    <div class="row mb-2">
                        <div class="row mt-3">
                            <div class="col">
                                <label for="firstname">First name<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input id="firstname" type="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $company->user->firstname }}" required autocomplete="firstname" placeholder="firstname">
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
                                    <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $company->user->lastname }}" required autocomplete="lastname" placeholder="lastname">
                                    <i class="bi bi-person-circle position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col">
                                <label for="pemail">Personal email<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input id="pemail" type="email" class="form-control @error('pemail') is-invalid @enderror" name="pemail" value="{{ $company->user->email }}" required autocomplete="pemail" placeholder="pemail">
                                    <input id="invalidMail" type="email" class="form-control" name="invalidMail" value="{{ $company->user->email }}" autocomplete="invalidMail" hidden>
                                    <i class="bi bi-envelope position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                        @error('pemail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col">
                                <label for="ptel">Phone No<span class="required">*</span></label>
                                <div class="input-group position-relative">
                                    <input id="ptel" type="ptel" class="form-control @error('ptel') is-invalid @enderror" name="ptel" value="{{ $company->user->tel }}" required autocomplete="ptel" placeholder="ptel">
                                    <i class="bi  bi-ptelephone position-absolute top-50 end-0  me-2 translate-middle-y"
                                        style="pointer-events: none;"></i>
                                        @error('ptel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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


            </div>
        </div>
    </section>

    
    <!-- Modal Confirmation -->
    <div class="modal fade" id="confirmModal" style="margin-top: 10% !important;"  tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Email Change</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to change your email?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmChange">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal OTP -->
    <div class="modal fade" style="margin-top: 10% !important;" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="otpForm">
                        @csrf
                        <div class="form-group">
                            <label for="otp">OTP:</label>
                            <input type="text" class="form-control" id="otp" name="otp">
                        </div>
                        <button type="submit" class="btn btn-primary">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        let emailTimeout;
        let newEmail;

        $('#pemail').on('input', function() {
            clearTimeout(emailTimeout);
            emailTimeout = setTimeout(function() {
                $('#confirmModal').modal('show');
            }, 2000); // 2 seconds
        });

/*
        $('#confirmChange').on('click', function() {
            $('#confirmModal').modal('hide');
            newEmail = $('#pemail').val();
            $('#otpModal').modal('show');
        });
*/
        $('#confirmChange').on('click', function() {
            $('#confirmModal').modal('hide');

            // Appel de la route via AJAX pour déclencher une action côté serveur
            $.ajax({
                url: '{{ route("sendnew.otp") }}', // Endpoint de la route à appeler
                type: 'GET', // Méthode HTTP GET par défaut
                success: function(response) {
                    // Gérer la réponse si nécessaire
                    console.log('Route called successfully');
                    
                    var otp = response.otp;
                    console.log(otp);
                    // Afficher le modal pour l'OTP ici si nécessaire
                    $('#otpModal').modal('show');
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs si nécessaire
                    console.error('Error calling route:', error);
                    alert('Failed to call route. Please try again.');
                }
            });
        });

        var oldPMail = $('#invalidMail').val();
        var newMail = $('#pemail').val();

        $('#otpForm').on('submit', function(e) {
            e.preventDefault();

            const otp = $('#otp').val();
            $.ajax({
                url: '{{ route("verify.otp") }}',
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    otp: otp,
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('#otpModal').modal('hide');
                        alert('OTP verification successfully!');
                        $('#pemail').val(newMail);
                        console.log(newMail);
                        // location.reload(); // Recharger la page pour refléter les changements
                    } else {
                        alert('Invalid OTP. Please try again.');
                        $('#pemail').val(oldPMail);
                        console.log(oldPMail);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error verifying OTP:', error);
                    alert('Failed to verify OTP. Please try again.');
                    $('#pemail').val(oldPMail);
                    console.log(oldPMail); 
                }
            });
        });

    });
</script>

@section('js')
@endsection
