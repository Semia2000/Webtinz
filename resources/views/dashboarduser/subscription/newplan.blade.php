@extends('dashboarduser.layoutuse')

@section('links')
@endsection

@section('content')
    <section id="plans" class="p-5 subscription">
        @if ($services->isNotEmpty())
            @foreach ($services as $service)
                <div class="row row-cols-1 row-cols-md-3 mb-4">
                    @foreach ($subscriptionsByServiceType[$service->id]['plans'] as $subscription)
                        <div class="col-md-4 mt-3">
                            <div class="card mb-3 h-100 {{ $subscriptionsByServiceType[$service->id]['upgrades']->contains('subscription_id', $subscription->id) ? 'border-success' : '' }}">
                                <div class="card-header" style="background: {{ $subscription->name == 'home' ? '#F1FCFF' : ($subscription->name == 'small_mid' ? '#FFF6EC' : '#F1FCFF') }};">
                                    {{ strtoupper(str_replace('_', ' ', $subscription->name)) }}
                                </div>
                                <div class="card-body flex-column d-flex justify-content-center text-left p-4">
                                    <div class="ms-3 mb-4">
                                        <h6 style="font-weight: bold">FCFA</h6>
                                        <h2>{{ $subscription->price }}<span>&nbsp;&nbsp;Per/{{ $service->subscription->duration ?? 'N/A' }} Months</span></h2>
                                    </div>
                                    <div class="mb-4 mt-4">
                                        <ul class="nav nav-pills flex-column flex-sm-row text-center border-0 rounded-nav"
                                            style="width:100%">
                                            <li class="nav-item flex-sm-fill">
                                                <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                                    aria-selected="false" class="nav-link border-0 font-weight-bold active"
                                                    style="background: {{ $subscription->name == 'home' ? '#F05940' : ($subscription->name == 'small_mid' ? '#8568FC' : '#2CC974') }};">{{ $subscription->duration }}
                                                    Months</a>
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
                                <div class="d-flex justify-content-between p-2">
                                    @if ($subscriptionsByServiceType[$service->id]['current'] && $subscriptionsByServiceType[$service->id]['current']->id == $subscription->id)
                                        <a href="#" class="btn btn-secondary flex-grow-1 mx-1" style="background: green;">
                                            Renews {{ $service->end_date }}
                                        </a>
                                        @if ($subscriptionsByServiceType[$service->id]['upgrades']->isNotEmpty())
                                            <a href="{{ route('confirmCancel', ['subscriptionId' => $subscription->id]) }}" class="btn btn-danger flex-grow-1 mx-1">Cancel</a>
                                        @endif
                                    @elseif ($subscriptionsByServiceType[$service->id]['upgrades']->contains('subscription_id', $subscription->id))
                                        <a href="#" class="btn btn-secondary flex-grow-1 mx-1" style="background: green;">Renew {{ $subscription->start_date }}</a>
                                    @elseif ($subscriptionsByServiceType[$service->id]['current'] && $subscription->price > $subscriptionsByServiceType[$service->id]['current']->price)
                                        <button class="btn btn-primary flex-grow-1 mx-1" data-service-id="{{ $service->id }}" data-toggle="modal" data-target="#upgradeModal" style="background-color: #F05940; border:1px solid #F05940">Upgrade</button>
                                    @else
                                        <button disabled class="btn btn-secondary flex-grow-1 mx-1" style="background-color: #F05940;">Upgrade</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <p>No services available.</p>
        @endif

        <!-- Modal Upgrade -->
        <div class="modal fade mt-5" id="upgradeModal" tabindex="-1" role="dialog" aria-labelledby="upgradeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="upgradeModalLabel">Choose Upgrade Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to upgrade within the same service or to another service?</p>
                    </div>
                    <div class="modal-footer">
                        <!-- Bouton pour l'upgrade dans le même service -->
                        <a href="{{ route('showUpgradesummary', ['id' => $service->id]) }}" class="btn btn-primary upgrade-same-service">Upgrade Same Service</a>
                        <!-- Bouton pour l'upgrade vers un autre service -->
                        <form id="upgradeForm" action="{{ route('serviceBegin.store', ['service_id' => $service->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Upgrade Different Service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Gérer le clic sur le bouton d'upgrade
            $('.upgrade-btn').click(function() {
                var serviceId = $(this).data('service-id');
                $('#upgradeModal').modal('show');
            });

            $('#upgradeForm').submit(function(e) {
                e.preventDefault(); // Empêcher le formulaire de se soumettre normalement
                $(this).unbind('submit').submit(); // Soumettre le formulaire
            });

            // Gérer le clic sur le bouton de cancel
            $('.btn-danger').click(function() {
                $('#cancelModal').modal('show');
            });
        });
    </script>
@endsection

