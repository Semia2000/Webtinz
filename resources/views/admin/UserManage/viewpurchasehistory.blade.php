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
                    <div class="callout callout-info">
                        @if ($user)
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <b>Company Informations</b><br>
                                    <address>
                                        <strong>{{ $user->company->name }}</strong><br>

                                        {{ $user->company->address }}<br>
                                        {{ $user->company->tel }}<br>
                                        {{ $user->company->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Admin</b>
                                    <br><br>
                                    <address>
                                        {{ $user->company->description }}<br>
                                        {{ $user->company->sector }}<br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Activity</b><br>
                                    <br>
                                    <b>Number of Orders: </b> {{ $services->count() }}<br>
                                    <b>Number of Upgrade: </b><br>
                                </div>
                                <!-- /.col -->
                            </div>
                        @endif
                    </div>
                    <div class="card" >
                        <div class="card-body">
                            <table id="example1" class="table  table-striped">
                                <thead>
                                    <th>Purchase History</th>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr id="printableArea">
                                            <td>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Service {{ $service->id }}</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse" title="Collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            {{-- <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove" title="Remove">
                                                                <i class="fas fa-times"></i>
                                                            </button> --}}
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="p-3">
                                                            <!-- info row -->
                                                            <div class="row invoice-info mb-4">
                                                                <div class="col-12 mb-3">
                                                                    <h4>
                                                                        <i class="fas fa-globe"></i> Webtinz, Inc.
                                                                        <small
                                                                            class="float-right">{{ $service->start_date }}</small>
                                                                    </h4>
                                                                </div>
                                                                <div class="col">
                                                                    <b>Orders Informations </b><br>
                                                                    <b>Type Service: </b>
                                                                    @if ($service->service_type == 'web')
                                                                        Website
                                                                    @elseif ($service->service_type == 'ecom')
                                                                        Ecommerce
                                                                    @endif
                                                                    <br>
                                                                    <b>Description: </b>{{ $service->description }}<br>
                                                                    <b>About company: </b> {{ $service->description }}<br>
                                                                    <b>Products or Services:
                                                                    </b>{{ $service->products_services }}<br>
                                                                    @if ($service->service_type == 'web')
                                                                        <b>Sector:</b> {{ $service->sector }}<br>
                                                                    @else
                                                                        <b>Product Category:</b>
                                                                        {{ $service->productcategory }}<br>
                                                                    @endif
                                                                    <b>Others Service:
                                                                    </b>{{ $service->others_services }}<br>
                                                                </div>
                                                                <!-- /.col -->

                                                            </div>
                                                            <!-- /.row -->

                                                            <!-- Table row -->
                                                            <div class="row mb-4">
                                                                <div class="col-12 table-responsive">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th style="width:50%">Template Image</th>
                                                                                <td><img alt="Avatar" width="100"
                                                                                        height="auto"
                                                                                        src="{{ asset('storage/' . $service->template->thumbnail) }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:50%">Template Name</th>
                                                                                <td>{{ $service->template->name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:50%">Plan Name</th>
                                                                                <td>
                                                                                    @if ($service->subscription->name == 'home')
                                                                                        Home Business Plan
                                                                                    @elseif($service->subscription->name == 'small_mid')
                                                                                        Small & Mid Size Business Plan
                                                                                    @else
                                                                                        Enterprise Plan
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:50%">Plan Duration</th>
                                                                                <td>{{ $service->subscription->duration }}
                                                                                    Months</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:50%">Site Deployed?</th>
                                                                                <td>
                                                                                    @if ($service->is_deployed == 0)
                                                                                        <button type="button"
                                                                                            class="btn btn-block btn-warning">Pending
                                                                                            Deployment</button>
                                                                                    @else
                                                                                        <button type="button"
                                                                                            class="btn btn-block btn-success">Deployed</button>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- /.col -->
                                                            </div>
                                                            <!-- /.row -->

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="lead">Amount</p>

                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th style="width:50%">Plan:</th>
                                                                                <td>{{ $service->subscription->price }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Template</th>
                                                                                <td>
                                                                                    @if ($service->template->price == '')
                                                                                        00
                                                                                    @else
                                                                                        {{ $service->template->price }}
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Setup Fee:</th>
                                                                                <td>{{ $service->subscription->setupfee }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Total:</th>
                                                                                <td>
                                                                                    {{ $service->subscription && $service->template
                                                                                        ? $service->subscription->price + $service->template->price + $service->subscription->setupfee
                                                                                        : 'N/A' }}
                                                                                    FCFA
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- /.row -->

                                                            <!-- this row will not appear when printing -->
                                                            <div class="row no-print">
                                                                <div class="col-12">
                                                                    <button onclick="printDiv('printableArea')"
                                                                        class="btn btn-success"><i class="fas fa-print"></i>
                                                                        Print</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>Purchase History</th>
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
                // "buttons": ["pdf", "print", ]
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

    <script>
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
