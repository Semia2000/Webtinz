@extends('admin.adminlayout')
@section('links')
    <style>
        .sectorbusiness-group {
            display: flex;
            align-items: center;
        }

        .sectorbusiness-group .form-control {
            flex: 1;
        }

        .sectorbusiness-group .btn-remove-sectorbusiness {
            margin-left: 10px;
        }

        #btn-add-sectorbusiness i {
            font-size: 0.8em;
        }
    </style>
@endsection
@section('content')
    <section class="content">

        <div class="row">
            <div class="col p-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('sectorbusiness.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Sector Business</label>
                                <div id="sectorbusiness-wrapper">
                                    <div class="sectorbusiness-group d-flex align-items-center mb-2">
                                        <input type="text" name="name[]" class="form-control me-2"
                                            placeholder="Sector Business">
                                        <button type="button" class="btn btn-danger btn-remove-sectorbusiness">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success mt-3" id="btn-add-sectorbusiness">
                                    <i class="fa fa-plus"> Add Sector Business</i>
                                </button>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sectorbusinessWrapper = document.getElementById('sectorbusiness-wrapper');
            const addsectorbusinessButton = document.getElementById('btn-add-sectorbusiness');

            addsectorbusinessButton.addEventListener('click', function() {
                const sectorbusinessGroup = document.createElement('div');
                sectorbusinessGroup.className = 'sectorbusiness-group d-flex align-items-center mb-2';
                sectorbusinessGroup.innerHTML = `
            <input type="text" name="name[]" class="form-control me-2" placeholder="sectorbusiness">
            <button type="button" class="btn btn-danger btn-remove-sectorbusiness">Remove</button>
        `;
                sectorbusinessWrapper.appendChild(sectorbusinessGroup);

                sectorbusinessGroup.querySelector('.btn-remove-sectorbusiness').addEventListener('click', function() {
                    sectorbusinessGroup.remove();
                });
            });

            // Attach the event listener to the existing remove button
            document.querySelectorAll('.btn-remove-sectorbusiness').forEach(button => {
                button.addEventListener('click', function() {
                    button.closest('.sectorbusiness-group').remove();
                });
            });
        });
    </script>
@endsection
