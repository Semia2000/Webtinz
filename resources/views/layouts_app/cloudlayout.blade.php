<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Webtinz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    {{-- css links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
{{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha384-F3pso4BSF02doNItN/n7cqOwxr3VgyR4v2RVKL4oQhpP/P1Tv5Ztp6SwyF0kr24d" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-0h1KGCNNTjxhlErPzC2k62uxkD1hZHZs/rGd6i2gAPgQToUgyZrA5w9hQl27WrUW4Er06OKjvIDfPzrJz7N5XQ=="
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-pC4Si8zd+VcVTzvb2aX+oLlsOGd2WH/TEs5zTmg5trt0rT+6ZlYeuWrwYNcF/E+q" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"
        integrity="sha512-rk/7usD8qDJhjKFcXrUJxLwX7dGs7Z7mTR5UvOHSLhe6uQ5QbBSExlDEUdUKE7gqGq4Hr9VmiDnvSrSqczRNYg=="
        crossorigin="anonymous"></script> --}}


    @yield('links')
</head>

<body style="background: url('{{ asset('assets/images/bg.png') }}'); background-size: cover; ">

    <main>
        @yield('content')
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

    @yield('js')
</body>

</html>
