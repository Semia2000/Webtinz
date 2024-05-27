@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Template</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('addtemplates') }}">
                        <i class="fas fa-plus">
                        </i>
                        Add Template
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
                                Type Service
                            </td>
                            <td>
                                {{ $template->typeservice }}
                            </td>
                           
                        </tr>
                        <tr>
                            <td>
                                Category
                            </td>
                            <td>
                                {{ $template->industrie }}
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
