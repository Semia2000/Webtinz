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
                <h1>Add staff member</h1>
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('addstafmem.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="firstname">Firstname <span class="required">*</span> </label>
                                    <input readonly autocomplete="off" placeholder="firstname"    value="{{ $user->firstname }}" type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror">
                                    @error('firstname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 col-lg">
                                    <label for="lastname">Lastname <span class="required">*</span> </label>
                                    <input readonly autocomplete="off" placeholder="lastname"    value="{{ $user->lastname }}" type="text" id="lastname" name="lastname" class="form-control  @error('lastname') is-invalid @enderror">
                                    @error('lastname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="email">Email <span class="required">*</span> </label>
                                    <input readonly autocomplete="off" placeholder="email"    value="{{ $user->email }}" type="email" id="email" name="email" class="form-control  @error('email') is-invalid @enderror">
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
                                            <option value="{{ $role->id }}" {{ $role->id==$user->role_id ? "selected" : "" }}> {{ $role->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="password">Password <span class="required">*</span> </label>
                                    <input readonly autocomplete="off" placeholder="password"    value="{{ old('password') == ""  ? "" :   old('password') }}" type="password" id="password" name="password" class="form-control  @error('password') is-invalid @enderror">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                    
                                <div class="form-group mt-3 col-lg">
                                    <label for="password_confirmation">Confirm password <span class="required">*</span> </label>
                                    <input readonly autocomplete="off" placeholder="password confirmation"    value="{{ old('password_confirmation') == ""  ? "" :   old('password_confirmation') }}" type="password" id="password_confirmation" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-3 col-lg">
                                    <label for="right">Right <span class="required">*</span> </label>
                                    <select multiple aria-label="multiple select example" name="right[]" id="right" class="form-control custom-select  @error('right') is-invalid @enderror">
                                        @error('right')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                            <option value="right_1"> Right 1 </option>
                                            <option value="right_2"> Right 2 </option>
                                            <option value="right_3"> Right 3 </option>
                                            <option value="right_4"> Right 4 </option>
                                            <option value="right_5"> Right 5 </option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
