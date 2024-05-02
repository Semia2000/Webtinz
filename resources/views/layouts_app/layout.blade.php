<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    {{-- css links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">

    @yield('links')
</head>

<body>
    <!-- section navbar -->
    <header id="home-header"
        style="background: url('{{ asset('assets/images/header-bg.png') }}') rgba(0, 0, 0, 0.6); background-blend-mode: overlay; background-size: cover; height:800px;">
        <div class="contains-header">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/images/logo (1).png') }}" alt="Logo" width="200"
                            height="50" class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
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
                        <div class="navbar-button d-flex ">
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">login</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link getstart" href="">Get Started</a>
                                </li>
                                <li class="nav-item">
                                    <select class="language-select">
                                        <option value="fr">
                                            <img src="french.svg" alt="French" class="language-icon"> Français
                                        </option>
                                        <option value="en">
                                            <img src="english.svg" alt="English" class="language-icon"> English
                                        </option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </nav>
            <div class="container title-header">
                <h3>Establish your <br>
                    <span class="circle-word">web</span>  presence & e-commerce <br>
                    capabilities with <span>Webtinz</span>
                </h3>
                <p>Create a website in <span>10 minutes</span>.</p>
                <div class="get-started-container">
                    <a class="getstart" href="#">Get Started</a>
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
                            <a href="#!" class="text-white">Contact </a>
                        </li>
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
                    <img src="{{ asset('assets/images/logo (1).png') }}" alt="Logo" width="250"
                        height="50" class="d-inline-block align-text-top">
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
    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    @yield('js')
</body>

</html>
