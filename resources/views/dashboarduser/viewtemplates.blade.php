@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section class="dashviewtemplate">
        <div class="row p-5">
            <div class="listtemplates whitepage p-5">
                    <h2>Company Contact Info</h2>
                    <p>Provide company contact information
                    </p>
                    <div class="row row-cols-1 row-cols-md-3 mt-5">
                        @if ($services)
                        @foreach ($services as $service)
                        <div class="col mt-5">
                            <div class="card template-card" data-template-id="{{ $service->template->id }}"
                                data-template-name="{{ $service->template->name }}" data-template-price="{{ $service->template->price }}">
                                <img class="" src="{{ asset('storage/' . $service->template->thumbnail) }}" width="100%"
                                    alt="">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <h4 class="me-auto">{{ $service->template->name }}</h4>
                                        <h4 class="templateprice ms-auto">
                                            @if ($service->template->price === null)
                                                FCFA 00
                                            @else
                                                FCFA {{ $service->template->price }}
                                            @endif
                                        </h4>
                                    </div>
                                    <p>By {{ $service->template->createby }}</p>
                                    <span>{{ $service->template->typetemplate }}</span>
                                    <div class="card-checkbox">
                                        <input type="checkbox" checked disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
