@extends('admin.adminlayout')
@section('links')
@endsection
@section('content')
    <section class="content">
        
        <div class="row">
            <div class="col p-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('productcategory.update',['id' => $productcategory->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Product Category</label>
                                <div id="productcategory-wrapper">
                                        <div class="productcategory-group">
                                            <input type="text" name="name" class="form-control mb-2" value="{{ $productcategory->name }}" placeholder="Product Category">
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
