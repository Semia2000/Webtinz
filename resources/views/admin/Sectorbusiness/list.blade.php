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
                <h3 class="card-title">Sector Business</h3>

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('addsectorbusiness') }}">
                        <i class="fas fa-plus">
                        </i>
                        Add Sector Business
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Sector Business
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sectorsbusiness as $sectorbusiness)
                            <tr>
                                <td>{{ $sectorbusiness->id }}</td>
                                <td>{{ $sectorbusiness->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('sectorbusiness.edit', $sectorbusiness->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    {{-- <a class="btn btn-danger btn-sm"  id="confirmDeleteModal" data-plan-id="{{ $subscriptionplan->id }}" onclick="deletePlan()">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a> --}}
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
