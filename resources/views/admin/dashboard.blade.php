@extends('admin.adminlayout')
@section('links')
<style>
    .modal-80w {
        width: 70vw !important;
    }

    .modal-80h {
        height: 80% !important;
        max-height: 80% !important;
    }
    .modal-80h {
    margin-left: -10%
    height: 80% !important;
    max-height: 80% !important;
    min-width: 60vw !important;
}
</style>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col">
                        @if ($master_admin)
                            <center class="my-2">
                                {{ "Welcome to your Dashboards Master Admin" }}
                            </center>
                        @else

                            <center class="my-2">
                                {{ "Welcome to your Dashboards" }}
                            </center>
                            <div class="row mx-3">
                                @forelse ($servicesAffects as $servicesAffect)
                                    <div class="card mx-3">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                List of task(s)
                                            </h3>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table table-striped projects" style="text-align: center" >
                                                <thead >
                                                    <tr>
                                                        <th>
                                                            No
                                                        </th>
                                                        <th>
                                                            Type
                                                        </th>
                                                        <th>
                                                            Custommer
                                                        </th>
                                                        <th>
                                                            Description
                                                        </th>
                                                        <th>
                                                            Products Services
                                                        </th>
                                                        <th>
                                                            Technical Manager
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 1  ?> 
                                                    @forelse ($servicesAffects as $servicesAffect)
                                                        <tr>
                                                            <td>{{ $count++ }}</td>
                                                            <td>
                                                                {{ $servicesAffect->service_type }}
                                                            </td>
                                                            <td>{{ $servicesAffect->user->firstname ." ". $servicesAffect->user->lastname }}
                                                            </td>
                                                            <td>
                                                                {{ $servicesAffect->description }}
                            
                                                            </td>
                                                            <td>
                                                                {{ $servicesAffect->products_services }}
                            
                                                            </td>
                                                            <td>
                                                                {{ $servicesAffect->tech->firstname ." ". $servicesAffect->tech->lastname}}
                            
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('serviceslist.show', $servicesAffect->id) }}">
                                                                    <i class="fas fa-eye">
                                                                    </i>
                                                                    Details
                                                                </a>  
                                                                @if ($sale_manager)
                                                                    <a href="" class="btn btn-secondary  btn-sm" data-toggle="modal" data-target="#myModal">
                                                                        <i class="fas fa-pencil-alt">
                                                                        </i>
                                                                            Comment
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <div class="alert alert-warning">
                                                            {{ "Auncun service" }}
                                                        </div>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-warning">
                                        No assignment
                                    </div>
                                @endforelse
                            </div>
        
                        @endif
                    </div>
                </div>
            </div>

 <!-- The Modal -->
 <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-80w">
        <div class="modal-content modal-80h">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <textarea name="content" id="editor" cols="50" rows="10"></textarea>
            </div>

        </div>
    </div>
</div>
            <!-- Small boxes (Stat box) -->
            {{--  
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col --> 
                </div>
            --}}
            <!-- /.row -->
            <!-- Main row -->
            {{--  
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Sales
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map card -->
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Visitors
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div>
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">Visitors</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">Online</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">Sales</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>


                    </section>
                    <!-- right col -->
                </div>
            --}}
            <!-- /.row (main row) -->
        </div>
    </section>
@endsection
@section('js')

<script>
    CKEDITOR.replace('editor');
</script>
@endsection
