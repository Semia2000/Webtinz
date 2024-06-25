@extends('dashboarduser.layoutuse')

@section('links')
@endsection

@section('content')
<section id="plans" class="p-5 subscription">
    @if ($services)
        <div class="row row-cols-1 row-cols-md-3 mb-4">
            @foreach ($services as $service)
                <div class="col-md-4 mt-3">
                    <div class="card mb-3 h-100 border-primary">
                        <div class="card-header" style="background: {{ $service->subscription->name == 'home' ? '#F1FCFF' : ($service->subscription->name == 'small_mid' ? '#FFF6EC' : '#F1FCFF') }};">
                            {{ strtoupper(str_replace('_', ' ', $service->subscription->name)) }}
                        </div>
                        <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                            <div class="ms-3 mb-4">
                                <h6 style="font-weight: bold">FCFA</h6>
                                <h2>{{ $service->subscription->price ?? 'N/A' }}<span>&nbsp;&nbsp;Per/ {{ $service->subscription->duration ?? 'N/A' }} Months</span></h2>
                            </div>
                            <div class="mb-4 mt-4">
                                <ul class="nav nav-pills flex-column flex-sm-row text-center border-0 rounded-nav" style="width:100%">
                                    <li class="nav-item flex-sm-fill">
                                        <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 font-weight-bold active" style="background: #F05940;">
                                            {{ $service->subscription->duration ?? 'N/A' }} Months
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-3 plan-features">
                                <div class="mb-3 mt-2">
                                    <p><i class="bi bi-check-lg"></i> Ready Made Design</p>
                                    <p><i class="bi bi-check-lg"></i> File encryption</p>
                                    <p><i class="bi bi-check-lg"></i> Unlimited client users</p>
                                </div>
                                <p><i style="color: #F05940;" class="bi bi-x-lg"></i> Setup Fee: {{ $service->subscription->setupfee ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <a href="" class="btn flex-grow-1 mx-1" style="background-color: @if ($service->is_deployed == 1) green; @else #f0ad4e;  @endif">
                                @if ($service->is_deployed == 1)
                                    Expire at {{ $service->end_date }}
                                @else
                                Pending Deployment
                                @endif   
                            </a>
                            <a href="{{ route('confirmCancel', ['subscriptionId' => $service->subscription->id ?? 0]) }}" class="btn btn-danger flex-grow-1 mx-1">Cancel</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No current services found.</p>
    @endif
</section>
@endsection
