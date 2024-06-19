@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    <section class="content">
        
        <div class="row">
            <div class="col p-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('sectorbusiness.update',['id' => $sectorbusiness->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Sector Business</label>
                                <div id="sectorbusiness-wrapper">
                                        <div class="sectorbusiness-group">
                                            <input type="text" name="name" class="form-control mb-2" value="{{ $sectorbusiness->name }}" placeholder="Sector Business">
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
