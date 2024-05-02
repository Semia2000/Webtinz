<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    {{-- css links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/userdash/user.css') }}">
</head>

<body>
    <section class="leftbar container-fluid">
        <div class="row g-0">
            <div class="col-3">
                <div class="sidebar">
                    <div class="">
                        <img src="{{ asset('assets/images/logo (1).png') }}" width="150" height="40"
                            alt="">
                        <hr>
                    </div>

                    <div class="nav-profile mt-3 mb-2">
                        <div class="row">
                            <div class="profile-image col-2">
                                <img class=" rounded-circle" width="35" height="35"
                                    src="{{ asset('assets/images/girl-choosing-one-option.png') }}" alt="profile image">
                            </div>
                            <div class="col-7 ms-2">
                                <p>welcome</p>
                                <h4>steve Johnson</h4>
                            </div>
                            <div class="col-2 ">
                                <i class="bi bi-three-dots"></i>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu ">
                        <ul class="nav d-flex flex-column">
                            <li class="nav-category">
                                <a class="menu-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="me-2 bi bi-stopwatch"></i>Dashboard</a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link {{ Request::is('companyurl') ? 'active' : '' }}" href="{{ route('companyurl') }}"><i class="me-2 bi bi-stopwatch"></i>BackendUrl</a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link {{ Request::is('subscription') ? 'active' : '' }}" href="{{ route('subscription') }}"><i class="me-2 bi bi-stopwatch"></i>Subscriptions
                                </a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link {{ Request::is('viewtemplates') ? 'active' : '' }}" href="{{ route('viewtemplates') }}"><i class="me-2 bi bi-stopwatch"></i>View
                                    Templates
                                </a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link " href=""><i class="me-2 bi bi-stopwatch"></i>Ecommerce Platform
                                </a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link {{ Request::is('bankdetail') ? 'active' : '' }}" href="{{ route('bankdetail') }}"><i class="me-2 bi bi-stopwatch"></i>Bank Detail
                                </a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link" href=""><i class="me-2 bi bi-stopwatch"></i>Ecommerce Cashout
                                </a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link myprofile" href="{{ route('myprofile') }}"><i class="me-2 bi bi-stopwatch"></i>My Profile</a>
                            </li>
                            <li class="nav-category">
                                <a class="menu-link" href=""><i class="me-2 bi bi-stopwatch"></i>Support & Help</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="col-9 contenant">

                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">

                        <p class="navbar-brand" href="#">Hi! <span>Steve Johson</span></p>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item mx-2">
                                    <div class="input-group rounded" style="width: 100%">
                                        <input type="search" class="form-control rounded" placeholder="Search"
                                            aria-label="Search" aria-describedby="search-addon" />
                                        <span class="input-group-text border-0" id="search-addon">
                                            <i class="bi bi-search"></i>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            <div class="navbar-button d-flex ">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#"><i class="bi bi-bell"></i></a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link " href=""><i class="bi bi-envelope"
                                                style="background: none"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>

    </section>

    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;
            $('.menu-link').each(function() {
                if ($(this).attr('href') === currentUrl) {
                    $(this).parent().addClass('active');
                }
            });
        });
    </script>


</body>

</html>
