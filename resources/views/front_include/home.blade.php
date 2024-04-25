@extends('layouts_app.layout')
@section('links')
@endsection
@section('content')
    <section class="avantages">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/code.png') }}" width="25" height="25" alt="Image 1">
                <h4 class="ms-2 mt-1">No Technical Skills </h4>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/support.png') }}" width="30" height="30"alt="Image 2">
                <h4 class="ms-2 mt-1">Free Support</h4>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/website 1.png') }}" width="25" height="25"alt="Image 3">
                <h4 class="ms-2 mt-1">5k+ Webtinz Happy Users</h4>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/landing-page.png') }}" width="25" height="25"alt="">
                <h4 class="ms-2 mt-1">Creative Landing Pages
                </h4>
            </div>
        </div>
        <div class="line"></div>
    </section>

    <section class="process text-center">
        <h6>our process</h6>
        <H2>How Webtinz Works</H2>
        <p>Give your users the best possible online presence through seamless
            connection with your platform</p>
        <div class="tree">
            <ul>
                <li>
                    <a href="#">Grand Child</a>
                    <ul>
                        <li>
                            <a href="#">Great Grand Child</a>
                            <span class="dot"></span>
                        </li>
                        <li>
                            <a href="#">Great Grand Child</a>
                            <span class="dot"></span>
                        </li>
                        <li>
                            <a href="#">Great Grand Child</a>
                            <span class="dot"></span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <section class="websitehome container">
        <div class="row">
            <div class="col-5 text-center">
                <img src="{{ asset('assets/images/website-designing 1.png') }}" alt="">
            </div>
            <div class="col-5 text-left">
                <h6>website design</h6>
                <H2>Transform Your <br> Ideas into Beautiful <br> Website</H2>
                <p>Phasellus pulvinar purus ex, sed iaculis lectus</p>
                <a class="getstart" href="">Get Started</a>
            </div>
        </div>
    </section>
    <section class="ecom container">
        <div class="row">
            <div class="col-4 text-right">
                <h6>ecommerce</h6>
                <H2>Build Your <br> eCommerce Store <br>
                    With Webtinz</H2>
                <p>Phasellus pulvinar purus ex, sed iaculis lectus</p>
                <a class="getstart" href="">Get Started</a>
            </div>
            <div class="col-5">
                <img src="{{ asset('assets/images/ILLUSTRATION.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="digitalisation container">
        <div class="row">
            <div class="col-5 text-center">
                <img src="{{ asset('assets/images/customer-feedback-analysis 1.png') }}" alt="">
            </div>
            <div class="col-5 text-left">
                <h6>Custom Digitalization</h6>
                <H2>Custom <br> Digitalization as <br> Your Need</H2>
                <p>Phasellus pulvinar purus ex, sed iaculis lectus</p>
                <a class="getstart" href="">Get Started</a>
            </div>
        </div>
    </section>
    <section class="templtesweb">
        <h6 class="text-center">Sample template</h6>
        <div class="defiletemplates mb-5 d-flex align-items-center justify-content-center">
            <h2 class="text-center" style="margin-right: 8%;margin-left: 8%">Professional Designs</h2>
            <div class="arrows d-flex align-items-center">
                <i class="bi bi-chevron-left left me-2"></i>
                <i class="bi bi-chevron-right right"></i>
            </div>
        </div>
        <div class="displaytemplates">
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col">
                                        <div class="templateimg">
                                            <img src="{{ asset('assets/images/2.png') }}"
                                                alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="templateimg">
                                            <img src="{{ asset('assets/images/2.png') }}"
                                                alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="templateimg">
                                            <img src="{{ asset('assets/images/2.png') }}"
                                                alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <section class="features position-relative">
        <div class="features-text text-center position-relative">
            <h6>Webtinz Features</h6>
            <H2>why choose us</H2>
            <p>Give your users the best possible online presence through seamless <br>
                connection with your platform</p>
        </div>
        <div class="container cartes position-absolute">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100 text-left">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/icons/cms 1.png') }}" class="card-img-top"
                                alt="Skyscrapers" />
                            <h5 class="card-title">CMS Management </h5>
                            <p class="card-text">
                                Etiam elementum nunc ut ante luctus <br> dignissim. Donec porttitor quam nisi, <br> sit amet
                                egestas odio.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/icons/analytics (2) 1.png') }}" class="card-img-top"
                                alt="Los Angeles Skyscrapers" />
                            <h5 class="card-title">Analytics </h5>
                            <p class="card-text">Etiam elementum nunc ut ante luctus <br> dignissim. Donec porttitor quam
                                nisi, <br> sit amet egestas odio.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/icons/payment-gateway 1.png') }}" class="card-img-top"
                                alt="Palm Springs Road" />
                            <h5 class="card-title">Payment Gateway <br>
                                Integration </h5>
                            <p class="card-text">
                                Etiam elementum nunc ut ante luctus <br> dignissim. Donec porttitor qua.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
                <div class="col">
                    <div class="card h-100 text-left">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/icons/ecommerce 1.png') }}" class="card-img-top"
                                alt="Skyscrapers" />
                            <h5 class="card-title">Ecommerce Cashout <br> Mechanism</h5>
                            <p class="card-text">
                                Etiam elementum nunc ut ante luctus <br> dignissim. Donec porttitor qua.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/icons/product-management 1.png') }}" class="card-img-top"
                                alt="Los Angeles Skyscrapers" />
                            <h5 class="card-title">Full Scale Product <br> Management </h5>
                            <p class="card-text">Etiam elementum nunc ut ante luctus <br> dignissim. Donec porttitor qu.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/icons/backend 1.png') }}" class="card-img-top"
                                alt="Palm Springs Road" />
                            <h5 class="card-title">Backend Access <br>
                                Management </h5>
                            <p class="card-text">
                                Etiam elementum nunc ut ante luctus <br> dignissim. Donec porttit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ourpartners container">
        <div class="ourpartners-text text-center">
            <h6>Who Use</h6>
            <H2>Our Partners</H2>
            <p>Over 50K+ Websites businesses growing with Tektinz</p>
        </div>
        <div class="partnersimage mt-5">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('assets/images/partners/image 1.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/partners/image 2.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/partners/image 3.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/partners/image 4.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/partners/image 5.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/partners/Logo-5f01c355 1.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial container">
        <div class="testimonial-text text-center ">
            <h6>Testimonials</h6>
            <H2>50K+ Clients Love Webtinz</H2>
        </div>
        <div class="testimonialcards container mt-5">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="card text-left">
                        <div class="card-body">
                            <div class="star d-flex">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h5 class="card-title">Awesome web builder!!</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis lacus sectu sses
                                sollicitudin, feugiat justo condimentum,nusl pharetra orci. Proin lobor.
                            </p>
                            <hr>
                            <div class="testimonialprofile d-flex">
                                <div>
                                    <img src="{{ asset('assets/images/profils/Ellipse 8 (1).png') }}" width="50"
                                        height="50" alt="">
                                </div>
                                <div class="ms-3">
                                    <h3>- Ish Jolasun</h3>
                                    <p>CEO Reboot Africa </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card  text-left">
                        <div class="card-body">
                            <div class="star d-flex">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h5 class="card-title">Awesome web builder!!</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis lacus sectu sses
                                sollicitudin, feugiat justo condimentum,nusl pharetra orci. Proin lobor.
                            </p>
                            <hr>
                            <div class="testimonialprofile d-flex">
                                <div>
                                    <img src="{{ asset('assets/images/profils/Ellipse 8 (1).png') }}" width="50"
                                        height="50" alt="">
                                </div>
                                <div class="ms-3">
                                    <h3>- Ish Jolasun</h3>
                                    <p>CEO Reboot Africa </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="faq container d-flex flex-column align-items-center justify-content-center">
        <div class="text-left">
            <h6>Faqs</h6>
            <h2>Frequently Asked Questions?</h2>

            <div class="">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Accordion Item #1
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempus.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempus..
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempus..
                        </div>
                      </div>
                    </div>
                  </div>
            </div>




        </div>

    </section>

    <section class="pricing container"
        style="background:url('{{ asset('assets/images/Gradient Background 1.png') }}');background-size:cover;height:500px">
        <div class="pricing-circle d-flex flex-column align-items-center justify-content-center">
            <h2>pricing Start @</h2>
            <h4>CFCA</h4>
            <h3>5000</h3>
        </div>
        <div class="text-center">
            <h6>pricing</h6>
            <h2>Low Pricing</h2>
            <p class="mb-5">Start building your websites just at CFCA 5000</p>
            <a class="pricinglink" href="">See Pricing</a>
        </div>
    </section>
@endsection
@section('js')
@endsection
