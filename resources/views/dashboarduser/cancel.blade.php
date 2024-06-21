@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section class="myprofileuser">
        <div class="whitepage p-5 mt-5">
            <h5>Confirm Cancellation</h5>
                <p>Are you sure you want to cancel this subscription?</p>
                <!-- Afficher les informations sur l'abonnement à annuler -->
                <p><strong>Subscription Plan:</strong> {{ $subscription->name }}</p>
                <p><strong>Price:</strong> {{ $subscription->price }} XOF</p>
                <p>Penalty fees apply for all plan cancellations before 18 months</p>
                <p>The fees that will be applied to your cancellation are:
                    <strong>{{ $penaltyAmount }} XOF</strong></p>
                    <a href="" class="btn btn-danger">Confirm Cancel</a>
                    <form  action="{{  }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="service_id" va
                        <input type="hidden" name="plan_id" id="selected-plan-id">
                        <div class="d-flex liens mb-5">
                            <button type="submit" id="continue-button" class="firstlink"
                                style="background: #F05940">Pay</button>
                        </div>
                    </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
