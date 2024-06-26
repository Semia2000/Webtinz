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
                <h3 class="card-title">Staff List</h3>

                {{-- <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{route('addstafmem')}}">
                        <i class="fas fa-plus">
                        </i>
                        Add staff member
                    </a>
                </div> --}}
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Fist Name
                            </th>
                            <th>
                                Last Name
                            </th>
                            <th>
                                Roles
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1  ?> 
                        @forelse ($servicesList as $listItem)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    {{ $listItem->service_type }}
                                </td>
                                <td>{{ $listItem->user->firstname ." ". $listItem->user->lastname }}
                                </td>
                                <td>
                                    {{ $listItem->description }}

                                </td>
                                <td>
                                    {{ $listItem->user->email }}

                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('serviceslist.show', $listItem->id) }}">
                                        <i class="fas fa-eye">
                                        </i>
                                        Details
                                    </a>
                                    @if ($master_admin || $sale_manager )  
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('joinsalesortech.join', $listItem->id) }}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Join Sales/Tech manager
                                        </a>
                                        <a class="btn btn-danger btn-sm"  id="confirmDeleteModal" data-plan-id="{{ $listItem->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
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
    </section>
@endsection
@section('js')    
@endsection
