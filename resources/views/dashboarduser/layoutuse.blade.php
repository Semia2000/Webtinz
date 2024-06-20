<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webtinz| Dashboard</title>

    <!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    {{-- css links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/userdash/user.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color: white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Hi! <span style="color: #F05940">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></a>
                </li>
            </ul>


            <div class="input-group position-relative mx-auto" style="width: 50%; background:#F8F8F8">
                <input type="search" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" style="border-radius: 5px"/>
                <i class="bi bi-search position-absolute top-50 end-0 me-2 translate-middle-y"
                    style="pointer-events: none;"></i>
            </div>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-envelope"></i>
                    </a>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar pt-4" style="background-color: #141414">
            <!-- Brand Logo -->
            <a href="{{ route('welcome') }}" class=" p-4">
                <img src="{{ asset('assets/images/logo (1).png') }}" width="150" height="40" alt="Webtinz Logo">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-4 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/images/girl-choosing-one-option.png') }}" class="img-circle mt-2"
                            alt="User Image" width="100" height="100">
                    </div>
                    <div class="info">
                        <p>welcome</p>
                        <h4>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
                    </div>
                    <div class=" ml-auto">
                        <i class="bi bi-three-dots"></i>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboarduser') ? 'active' : '' }}"
                                href="{{ route('dashboarduser') }}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('companyurl') ? 'active' : '' }}"
                                href="{{ route('companyurl') }}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    BackendUrl
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('subscriptionuser') ? 'active' : '' }}"
                                href="{{ route('subscriptionuser') }}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Subscriptions
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('viewtemplates') ? 'active' : '' }}"
                                href="{{ route('viewtemplates') }}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    View Templates
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Ecommerce Platform
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('bankdetail') ? 'active' : '' }}"
                                href="{{ route('bankdetail') }}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Bank Detail
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Ecommerce Cashout
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('myprofile') ? 'active' : '' }}"
                                href="{{ route('myprofile') }}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Support & Help
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link {{ Request::is('logout') ? 'active' : '' }}"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>
                                        {{ __('Logout') }}
                                    </p>

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            {{-- <a class="nav-link {{ Request::is('logout') ? 'active' : '' }}"
                                href="{{ route('logout') }}">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Logout
                                </p>
                            </a> --}}
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color:#F2F2F2; height:auto">

            <!-- Main content -->
            <section class="content pt-5">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;
            $('.nav-link').each(function() {
                if ($(this).attr('href') === currentUrl) {
                    $(this).parent().addClass('active');
                }
            });
        });
    </script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
