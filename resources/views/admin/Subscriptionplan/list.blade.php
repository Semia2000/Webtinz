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
                        @foreach ($subscriptionplans as $subscriptionplan)
                            <tr>
                                <td>
                                    @if ($subscriptionplan->duration == 6)
                                    6 Months
                                    @else
                                    Yearly
                                    @endif
                                </td>
                                <td>
                                    @if ($subscriptionplan->name == "home")
                                    HOME BUSINESS
                                    @elseif ($subscriptionplan->name == "small_mid")
                                    SMALL & MID SIZE BUSINESS
                                    @else
                                    ENTERPRISE
                                    @endif
                                </td>
                                <td>
                                    {{ $subscriptionplan->price }}

                                </td>
                                <td>
                                    {{ $subscriptionplan->setupfee }}

                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('subscription.view', $subscriptionplan->id) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('subscription.edit', $subscriptionplan->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm"  id="confirmDeleteModal" data-plan-id="{{ $subscriptionplan->id }}" onclick="deletePlan()">
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
    <!-- JavaScript pour gérer la suppression -->
    <script>
        function deletePlan() {
            var planId = document.getElementById('confirmDeleteModal').getAttribute('data-plan-id');
            if (confirm("Are you sure you want to delete this plan?")) {
                // Si l'utilisateur clique sur OK, redirigez vers la route de suppression avec l'identifiant du plan
                window.location.href = "{{ url('subscription') }}/" + planId ;
            } else {
                // Si l'utilisateur clique sur Annuler, redirigez simplement
                window.location.href = "{{ route('subscriptionlist') }}";
            }
        }
    </script>
    
@endsection
