@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    <section class="content">

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
                                Pay Satus
                            </td>
                            <td>
                                {{ $serviceShow->is_pay_done != 0 ? "Done" : "Pending" }}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Sales Rep
                            </td>
                            <td>
                                <form action="" method="post">
                                    <div class="row">    
                                        <div class="col-lg">
                                            @foreach ($salesManagers  as $salesManager )
                                                <select name="sales_id" id="sales_id" class="form-control custom-select  ">
                                                    <option value="{{ $salesManager->id }}">{{ $salesManager->firstname }}</option>
                                                </select>                                    
                                            @endforeach 
                                        </div>
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form> 
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Tech Manager
                            </td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">    
                                        <div class="col-lg">
                                            @foreach ($techManagers  as $techManager )
                                                <select name="sales_id" id="sales_id" class="form-control custom-select  ">
                                                    <option value="{{ $techManager->id }}">{{ $techManager->firstname }}</option>
                                                </select>                                    
                                            @endforeach 
                                        </div>
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form>    
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
