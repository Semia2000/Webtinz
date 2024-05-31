@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    <section class="content">
        
        <div class="row">
            <div class="col p-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('typetemplate.update',['id' => $typetemplate->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Type Template</label>
                                <div id="typetemplate-wrapper">
                                        <div class="typetemplate-group">
                                            <input type="text" name="name" class="form-control mb-2" value="{{ $typetemplate->name }}" placeholder="Type Template">
                                        </div>
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
