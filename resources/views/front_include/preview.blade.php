@extends('layouts_app.cloudlayout')
@section('content')
    <section class=" d-flex flex-column justify-content-center align-items-center mb-5">
        <div class="text-center mt-5 mb-5">
            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
        </div>
        <div class="container">
            <h3 class="text-center">Preview: {{ $template->name }}</h3>
            <iframe src="{{ asset('storage/templates/' . $template->zip_file) }}" width="100%" height="600px"></iframe>
        </div>
    </section>
@endsection
