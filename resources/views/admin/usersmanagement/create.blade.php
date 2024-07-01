@extends('admin.adminlayout')
@section('links')
    <style>
        .feature-group {
            display: flex;
            align-items: center;
        }

        .feature-group .form-control {
            flex: 1;
        }

        .feature-group .btn-remove-feature {
            margin-left: 10px;
        }

        #btn-add-feature i {
            font-size: 0.8em;
        }

        .required{
            color:red;
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col p-5">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('roor') }}
                    </div>
                @endif
                <h1>Add staff member</h1>
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('addstafmem.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="firstname">Firstname <span class="required">*</span> </label>
                                    <input autocomplete="off" placeholder="firstname"    value="{{ old('firstname') == ""  ? "" :   old('firstname') }}" type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror">
                                    @error('firstname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 col-lg">
                                    <label for="lastname">Lastname <span class="required">*</span> </label>
                                    <input autocomplete="off" placeholder="lastname"    value="{{ old('lastname') == ""  ? "" :   old('lastname') }}" type="text" id="lastname" name="lastname" class="form-control  @error('lastname') is-invalid @enderror">
                                    @error('lastname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="email">Email <span class="required">*</span> </label>
                                    <input autocomplete="off" placeholder="email"    value="{{ old('email') == ""  ? "" :   old('email') }}" type="email" id="email" name="email" class="form-control  @error('email') is-invalid @enderror">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                    
                                <div class="form-group mt-3 col-lg">
                                    <label for="role">Role <span class="required">*</span> </label>
                                    <select name="role_id" id="role_id" class="form-control custom-select  @error('role_id') is-invalid @enderror">
                                        @error('role_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="password">Password <span class="required">*</span> </label>
                                    <input autocomplete="off" placeholder="password"    value="{{ old('password') == ""  ? "" :   old('password') }}" type="password" id="password" name="password" class="form-control  @error('password') is-invalid @enderror">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                    
                                <div class="form-group mt-3 col-lg">
                                    <label for="password_confirmation">Confirm password <span class="required">*</span> </label>
                                    <input autocomplete="off" placeholder="password confirmation"   value="{{ old('password_confirmation') == ""  ? "" :   old('password_confirmation') }}" type="password" id="password_confirmation" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="right">Right <span class="required">*</span> </label>
                                    <select multiple name="right[]" id="right" class="form-control custom-select  @error('right') is-invalid @enderror">
                                        @error('right')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
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
@endsection
