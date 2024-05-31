@extends('admin.adminlayout')
@section('links')
    <style>
        .typetemplate-group {
            display: flex;
            align-items: center;
        }

        .typetemplate-group .form-control {
            flex: 1;
        }

        .typetemplate-group .btn-remove-typetemplate {
            margin-left: 10px;
        }

        #btn-add-typetemplate i {
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
                        <form action="{{ route('typetemplate.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Type Template</label>
                                <div id="typetemplate-wrapper">
                                    <div class="typetemplate-group d-flex align-items-center mb-2">
                                        <input type="text" name="name[]" class="form-control me-2"
                                            placeholder="Type Template">
                                        <button type="button" class="btn btn-danger btn-remove-typetemplate">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success mt-3" id="btn-add-typetemplate">
                                    <i class="fa fa-plus"> Add Type Template</i>
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
            const typetemplateWrapper = document.getElementById('typetemplate-wrapper');
            const addtypetemplateButton = document.getElementById('btn-add-typetemplate');

            addtypetemplateButton.addEventListener('click', function() {
                const typetemplateGroup = document.createElement('div');
                typetemplateGroup.className = 'typetemplate-group d-flex align-items-center mb-2';
                typetemplateGroup.innerHTML = `
            <input type="text" name="name[]" class="form-control me-2" placeholder="typetemplate">
            <button type="button" class="btn btn-danger btn-remove-typetemplate">Remove</button>
        `;
                typetemplateWrapper.appendChild(typetemplateGroup);

                typetemplateGroup.querySelector('.btn-remove-typetemplate').addEventListener('click', function() {
                    typetemplateGroup.remove();
                });
            });

            // Attach the event listener to the existing remove button
            document.querySelectorAll('.btn-remove-typetemplate').forEach(button => {
                button.addEventListener('click', function() {
                    button.closest('.typetemplate-group').remove();
                });
            });
        });
    </script>
@endsection
