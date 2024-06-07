@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section id="plans" class="p-5 subscription">
        @if ($services)
            @foreach ($services as $service)
            <h4 class="mb-3">Service Type : {{ $service->service_type }}</h4>
            <div class="row row-cols-1 row-cols-md-3 mb-4">
                @foreach ($subscriptionsByServiceType[$service->id] as $subscription)
                    <div class="col-md-4 mt-3">
                        <div class="card mb-3 h-100 {{ $service->subscription && $service->subscription->id == $subscription->id ? 'border-primary' : '' }}">
                            <div class="card-header"
                                style="background: {{ $subscription->name == 'home' ? '#F1FCFF' : ($subscription->name == 'small_mid' ? '#FFF6EC' : '#F1FCFF') }};">
                                {{ strtoupper(str_replace('_', ' ', $subscription->name)) }}
                            </div>
                            <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                                <div class="ms-3 mb-4">
                                    <h6 style="font-weight: bold">FCFA</h6>
                                    <h2>{{ $subscription->price }}<span>&nbsp;&nbsp;Per/6momths</span></h2>
                                </div>
                                <div class="mb-4 mt-4">
                                    <ul class="nav nav-pills flex-column flex-sm-row text-center border-0 rounded-nav"
                                        style="width:100%">
                                        <li class="nav-item flex-sm-fill">
                                            <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                                aria-selected="false"
                                                class="nav-link border-0 font-weight-bold active" style="background: {{ $subscription->name == 'home' ? '#F05940' : ($subscription->name == 'small_mid' ? '#8568FC' : '#2CC974') }};">{{ $subscription->duration }} Months</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mb-3 plan-features">
                                    <div class="mb-3 mt-2">
                                        <p><i class="bi bi-check-lg"></i> Ready Made Design</p>
                                        <p><i class="bi bi-check-lg"></i> File encryption</p>
                                        <p><i class="bi bi-check-lg"></i> Unlimited client users</p>
                                    </div>
                                    <p><i style="color: #F05940;" class="bi bi-x-lg"></i> Setup Fee:
                                        {{ $subscription->setupfee }}</p>
                                </div>
                            </div>
                            <div class="d-flex liens text-center p-1">
                                @if ($service->subscription && $service->subscription->id == $subscription->id)
                                <a href="" class="firstlink btn btn-secondary w-100" style="background: green;">Renews {{ $service->end_date }}</a>
                                @elseif ($service->subscription && $subscription->price > $service->subscription->price)
                                    <a href="{{ route('showUpgradesummary', ['service_id' => $service->id]) }}" class="btn btn-primary w-100" style="background-color: #F05940;border:1px solid #F05940">Upgrade</a>
                                @else
                                    <button disabled class="btn btn-secondary w-100" style="background-color: #F05940;" >Upgrade</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        @endif
    </section>
@endsection
@section('js')
@endsection
