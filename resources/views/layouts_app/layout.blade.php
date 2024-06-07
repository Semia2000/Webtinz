<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Webtinz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" />

    
    {{-- css links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">

    @yield('links')
</head>

<body>
    <!-- section navbar -->
    <header id="home-header"
        style="background: url('{{ asset('assets/images/header-bg.png') }}') rgba(0, 0, 0, 0.6); background-size: cover; height:800px;">
        <div class="contains-header">
            <nav class="navbar  navbar-expand-lg" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/images/logo (1).png') }}" alt="Logo" width="150px"
                            class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">webtinz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item me-2">
                                    <a class="nav-link active" aria-current="page" href="#">How It Works</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link" href="#">Pricing </a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link" href="#">Templates</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link" href="#">Help Center</a>
                                </li>
                            </ul>
                            <div class="navbar-button  d-flex">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link fistlink" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link getstart" href="{{ route('register') }}">Sign UP</a>
                                    </li>

                                    <div class="dropdown">
                                        <button class="language-select dropdown-toggle" type="button"
                                            id="language-select" data-bs-toggle="dropdown" aria-expanded="false"><span
                                                class="flag-icon flag-icon-gb me-1"></span>
                                            <span>English</span></button>
                                        <ul class="dropdown-menu" aria-labelledby="language-select">
                                            <li>
                                                <a class="dropdown-item active" href="#"><span
                                                        class="flag-icon flag-icon-us me-1"></span>
                                                    <span>English</span></a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><span
                                                        class="flag-icon flag-icon-fr me-1"></span>
                                                    <span>French</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container title-header">
                <h3>Establish your <br>
                    <span class="circle-word">web</span> presence & e-commerce <br>
                    capabilities with <span>Webtinz</span>
                </h3>
                <p>Create a website in <span>10 minutes</span>.</p>
                <div class="get-started-container">
                    <a class="getstart" href="{{ route('letstart') }}">Get Started</a>
                </div>
            </div>

        </div>

    </header>

    <main>
        @yield('content')
    </main>



    <footer class="text-center mt-5 text-lg-start text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row my-4">


                <div class=" column1 col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class=" mb-4">Get Help?</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p class="men1">Call 24X7</p>
                        </li>
                        <li>
                            <p class="men2">229 543 35133</p>
                        </li>
                        <li>
                            <p class="men3">sales@tektinz.com</p>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="column1 mb-4">Quicklinks</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('letstart') }}" class="text-white">Get Started</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">Home</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">About Us</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">How It Woks</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">Pricing</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">Help Centre</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">Copy Right</a>
                        </li>
                        {{-- <li class="mb-2">
                            <a href="#!" class="text-white">Contact </a>
                        </li> --}}
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="column1 mb-4">Follow Us On</h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#!" class="text-white">YouTube</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">Facebook</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">Instagram</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-white">LinkedIn</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('assets/images/logo (1).png') }}" alt="Logo"
                        class="d-inline-block align-text-top">
                </div>


                {{-- <ul class="list-unstyled d-flex flex-row justify-content-center">
                          <li>
                              <a class="text-white px-2" href="#!">
                                  <i class="fab fa-facebook-square"></i>
                              </a>
                          </li>
                          <li>
                              <a class="text-white px-2" href="#!">
                                  <i class="fab fa-instagram"></i>
                              </a>
                          </li>
                          <li>
                              <a class="text-white ps-2" href="#!">
                                  <i class="fab fa-youtube"></i>
                              </a>
                          </li>
                      </ul> --}}

            </div>

            <!--Grid column-->

            <!--Grid column-->
        </div>
        <!--Grid row-->
        </div>
        <!-- Grid container -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let timeout;
    
        function resetTimeout() {
            clearTimeout(timeout);
            timeout = setTimeout(logoutUser, 100 * 60 * 1000); // 100 minutes in milliseconds
        }
    
        function logoutUser() {
            fetch('{{ route('logout') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            }).then(response => {
                if (response.ok) {
                    window.location.href = '{{ route('login') }}';
                }
            });
        }
    
        // Reset the timeout on any user activity
        window.onload = resetTimeout;
        document.onmousemove = resetTimeout;
        document.onkeydown = resetTimeout;
        document.onclick = resetTimeout;
        document.onscroll = resetTimeout;
    </script>
    
    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            var navbarBrand = document.querySelector('.navbar-brand img');
            var navLinks = navbar.querySelectorAll('li.nav-item a');
            var languageSelect = document.querySelector('.language-select');
            var scroll = window.scrollY;

            if (scroll < 10) {
                navbar.classList.remove('BgColour');
                navbarBrand.setAttribute('src', '/assets/images/logo (1).png');

                navLinks.forEach(function(link) {
                    if (link !== languageSelect) {
                        link.style.color = '#FFF';
                    }
                });

                languageSelect.style.background = 'transparent';
                languageSelect.style.color = '#fff';

            } else {
                navbar.classList.add('BgColour');
                navbarBrand.setAttribute('src', '/assets/images/logo.png');

                navLinks.forEach(function(link) {
                    if (link !== languageSelect) {
                        link.style.color = '#4E4E4E';
                    }
                });

                languageSelect.style.background = '#fff ';
                languageSelect.style.color = '#4E4E4E';
            }
        });
    </script>
    @yield('js')
</body>

</html>
