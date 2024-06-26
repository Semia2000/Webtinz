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
                    <a class="btn btn-primary btn-sm" href="{{-- route('') --}}">
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
                                Custommer
                            </td>
                            <td>
                                {{ $serviceShow->user->firstname ." ". $serviceShow->user->lastname }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Service Type
                            </td>
                            <td>
                                {{ $serviceShow->service_type }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Descripton
                            </td>
                            <td>
                                {{ $serviceShow->description }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Products Services
                            </td>
                            <td>
                                {{ $serviceShow->products_services }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Sector
                            </td>
                            <td>
                                {{ $serviceShow->sector }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Others Services
                            </td>
                            <td>
                                {{ $serviceShow->others_services }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Products Categories
                            </td>
                            <td>
                                {{ $serviceShow->productcategory }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Commerce Mode
                            </td>
                            <td>
                                {{ $serviceShow->commerce_mode }}
                            </td>

                        </tr>
                        {{-- <tr>
                            <td>
                                Products Services
                            </td>
                            <td>
                                {{ $serviceShow->template->name .' image:'. $serviceShow->template->thumbnail }}
                            </td>

                        </tr> --}}
                        <tr>
                            <td>
                                Subscription
                            </td>
                            <td>
                                {{ $serviceShow->subscription_id }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Pay Satus
                            </td>
                            <td>
                                
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Start Date
                            </td>
                            <td>
                                {{ $serviceShow->start_date == "" ? "Pending Deployment" : $serviceShow->start_date }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                End Date
                            </td>
                            <td>
                                {{ $serviceShow->end_date == "" ? "Pending Deployment" : $serviceShow->end_date }}
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
