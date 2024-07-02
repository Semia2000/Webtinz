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

                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{route('addstafmem')}}">
                        <i class="fas fa-plus">
                        </i>
                        Add staff member
                    </a>
                </div>
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
                                Status
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1  ?>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    {{ $user->firstname }}
                                </td>
                                <td>{{ $user->lastname }}
                                </td>
                                <td>
                                    {{ $user->role->name }}

                                </td>
                                <td>
                                    {{ $user->email }}

                                </td>
                                <td>
                                    {{ $user->status ==1 ? 'Active' : 'Disable' }}
                                </td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-info btn-sm mx-1"
                                            href="{{ route('addstafmem.edit', $user->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="{{ route('addstafmem.updatestatus', $user->id) }}" method="POST" class=" mx-1">
                                            @csrf
                                            <input type="number" name="status" id="status" hidden value="{{ $user->status!=1 ? '1' : '0' }}">
                                            <button type="submit" class="btn {{ $user->status ==1 ? 'btn-danger' : 'btn-success' }}  btn-sm"  id="confirmDeleteModal" data-plan-id="{{ $user->status }}">
                                                <i class="fas {{ $user->status ==1 ? 'fa-trash' : 'fa-check' }} ">
                                                </i>
                                                {{ $user->status ==1 ? 'Disabled' : 'Active' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-warning">
                                {{ "Auncun utilisateur" }}
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
