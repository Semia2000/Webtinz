@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Subscription plans</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('addsubscription') }}">
                        <i class="fas fa-plus">
                        </i>
                        Add plans
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                Attribute
                            </th>
                            <th>
                                Value
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Duration
                            </td>
                            <td>
                                @if ($subscriptionplan->duration == 6)
                                6 Months
                                @else
                                Yearly
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                @if ($subscriptionplan->name == "home")
                                HOME BUSINESS
                                @elseif ($subscriptionplan->name == "small_mid")
                                SMALL & MID SIZE BUSINESS
                                @else
                                ENTERPRISE
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Price
                            </td>
                            <td>
                                {{ $subscriptionplan->price }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Description
                            </td>
                            <td>
                                {{ $subscriptionplan->description }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Features
                            </td>
                            <td>
                                @foreach ($subscriptionplan->features as $feature)
                                    <p class="mb-3"><i class="fas fa-check-lg"></i>{{ $feature }}</p>
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Setup Fee
                            </td>
                            <td>
                                {{ $subscriptionplan->setupfee }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Type Service
                            </td>
                            <td>
                                {{ $subscriptionplan->typeservice }}
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
@section('js')
@endsection
