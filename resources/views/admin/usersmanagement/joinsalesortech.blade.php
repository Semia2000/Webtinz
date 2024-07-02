@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    <section class="content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Join Sales Rep / Tech Manager</h3>
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
                                {{ $serviceShow->user->firstname . ' ' . $serviceShow->user->lastname }}
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
                                Pay Satus
                            </td>
                            <td>
                                {{ $serviceShow->is_pay_done != 0 ? 'Done' : 'Pending' }}
                            </td>

                        </tr>
                        @if ($master_admin)
                            <tr>
                                <td>
                                    Sales Rep
                                </td>
                                <td>
                                    <form action="{{ route('joinsales.join', $serviceShow->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg">
                                                <select name="sales_id" id="sales_id" class="form-control custom-select  ">
                                                    @foreach ($salesManagers as $salesManager)
                                                        <option value="{{ $salesManager->id }}"
                                                            {{ $serviceShow->sales_id == $salesManager->id ? 'selected' : '' }}>
                                                            {{ $salesManager->firstname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endif

                        @if ($sale_manager)
                            <tr>
                                <td>
                                    Tech Manager
                                </td>
                                <td>
                                    <form action="{{ route('jointech.join', $serviceShow->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg">
                                                <select name="tech_id" id="tech_id" class="form-control custom-select  ">
                                                    @foreach ($techManagers as $techManager)
                                                        <option value="{{ $techManager->id }}"
                                                            {{ $serviceShow->tech_id == $techManager->id ? 'selected' : '' }}>
                                                            {{ $techManager->firstname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endif
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
