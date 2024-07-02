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
                                Name
                            </td>
                            <td>
                                {{ $template->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Description
                            </td>
                            <td>
                                {{ $template->description }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Status
                            </td>
                            <td>
                                @if ($template->access_level == "Free")
                                    00 FCFA
                                @else
                                {{ $template->price }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Template type
                            </td>
                            <td>
                                {{ $template->typetemplate }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Created By
                            </td>
                            <td>
                                {{ $template->createby }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Image
                            </td>
                            <td>
                                <img alt="Avatar" width="100" height="auto"
                                    src="{{ $template->thumbnail }}">
                            </td>
                        </tr>

                        @if (  $template->typeservice == "ecom")
                        <tr>
                            <td>
                                Product type
                            </td>
                            <td>
                                {{ $template->commerce_mode }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Product Category
                            </td>
                            <td>
                                {{ $template->productcategory }}
                            </td>
                        </tr> 
                        @elseif ($template->typeservice == "web") 

                        <tr>
                            <td>

                                Category
                            </td>
                            <td>
                                {{ $template->industrie }}
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
