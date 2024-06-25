@extends('admin.adminlayout')
@section('links')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Subscriptions</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th>User Name</th>
                                    <th>Company Name</th>
                                    <th>Type Service</th>
                                    <th>Plan</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>status</th>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->user->firstname }} {{ $service->user->lastname }}</td>
                                            <td></td>
                                            <td>{{ $service->service_type }}</td>
                                            <td>{{ $service->subscription->name }}</td>
                                            <td>{{ $service->subscription->price }} FCFA</td>
                                            <td>{{ $service->subscription->duration }} Months</td>
                                            <td>
                                                <div class="btn-group d-flex justify-content-between w-100">
                                                    <button type="button" class="btn  @if ($service->is_deployed == 1) btn-success @else btn-warning  @endif">
                                                        @if ($service->is_deployed == 0)
                                                            Pending deployment
                                                        @else
                                                            Deployed
                                                        @endif
                                                    </button>
                                                    <button type="button" class="btn @if ($service->is_deployed == 1) btn-success @else btn-warning @endif dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="{{ route('toggledeployment', ['service_id' => $service->id, 'action' => 'nodeployed']) }}">Pending deployment</a>
                                                        <a class="dropdown-item" href="{{ route('toggledeployment', ['service_id' => $service->id, 'action' => 'deployed']) }}">Deployed</a>
                                                    </div>
                                                </div>   
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>User Name</th>
                                    <th>Company Name</th>
                                    <th>Type Service</th>
                                    <th>Plan</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>status</th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@section('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
