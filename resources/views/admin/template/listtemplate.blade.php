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
                               Type Services
                            </th>
                            <th>
                                Names
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($templates as $template)
                            <tr>
                                <td>
                                    {{ $template->typeservice }}
                                </td>
                                <td>
                                    {{ $template->name }}
                                </td>
                                <td>
                                    {{ Str::limit($template->industrie, 30, '...') }}
                                </td>
                                <td>
                                    <span class="badge badge-success">{{ $template->access_level }}</span>
                                </td>
                                <td>
                                    <img alt="Avatar" width="100" height="auto" src="{{ asset('storage/' . $template->thumbnail) }}">
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach



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
