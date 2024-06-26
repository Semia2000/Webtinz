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
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('addstafmem.edit', $user->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm"  id="confirmDeleteModal" data-plan-id="{{ $user->id }}" onclick="deletePlan()">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
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
    <!-- JavaScript pour gérer la suppression -->
    <script>
        function deletePlan() {
            var planId = document.getElementById('confirmDeleteModal').getAttribute('data-plan-id');
            if (confirm("Are you sure you want to delete this plan?")) {
                // Si l'utilisateur clique sur OK, redirigez vers la route de suppression avec l'identifiant du plan
                window.location.href = "{{ url('addstafmem') }}/" + planId ;
            } else {
                // Si l'utilisateur clique sur Annuler, redirigez simplement
                window.location.href = "{{ route('addstafmem') }}";
            }
        }
    </script>
    
@endsection
