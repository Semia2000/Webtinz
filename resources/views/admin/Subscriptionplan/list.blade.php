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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Template</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('addsubscription') }}">
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
                                Duration
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Setup Fee
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptionplans as $subscriptionplan )
                        <tr>
                            <td>
                                {{ $subscriptionplan->duration }}
                            </td>
                            <td>
                                {{ $subscriptionplan->name }}

                            </td>
                            <td>
                                {{ $subscriptionplan->price }}

                            </td>
                            <td>
                                {{ $subscriptionplan->setupfee }}

                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('subscription.view', $subscriptionplan->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('subscription.edit', $subscriptionplan->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ route('subscription.delete', $subscriptionplan->id) }}">
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
        </div>
    </section>
@endsection
@section('js')
@endsection
