@extends('layouts_app.layout')
@section('links')
@endsection
@section('content')
    <section class="avantages">
        <div class="container-fluid">
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
        </div>

        <div class="line"></div>
    </section>
    <section class="process text-center mt-5">
        <h6>our process</h6>
        <H2>How Webtinz Works</H2>
        <p>Give your users the best possible online presence through seamless <br>
            connection with your platform</p>
        <div class="tree">
            <ul>
                <li>
                    <a href="#" class="parent"><img src="{{ asset('assets/images/Subtract.png') }}" width="50"
                            height="50" alt=""></a>
                    <ul>
                        <li class="firstchlidli">
                            <div><span style="color: red; font-size: 20px;">●</span></div>
                            <a href="#" class="firstchlid">
                                <h6 class="chiffre">01</h6>
                                Select your <br> Business type
                            </a>
                            {{-- <span class="dot"></span> --}}
                        </li>
                        <li class="secondchlidli">
                            <div><span style="color: red; font-size: 20px;">●</span></div>
                            <a href="#">
                                <h6 class="chiffre">03</h6>
                                Choose <br>Membership
                            </a>
                        </li>
                        <li>
                            <div><span style="color: red; font-size: 20px;">●</span></div>
                            <a href="#">
                                <h6 class="chiffre">03</h6>
                                Get Your<br>Website Online
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <section class="websitehome container">
        <div class="row">
            <div class="col text-center">
                <img src="{{ asset('assets/images/website-designing 1.png') }}" alt="">
            </div>
            <div class="col">
                <h6>website design</h6>
                <H2>Transform Your <br> Ideas into Beautiful <br> Website</H2>
                <p>Phasellus pulvinar purus ex, sed iaculis lectus</p>
                <a class="getstart" href="{{ route('letstart') }}">Get Started</a>
            </div>
        </div>
    </section>
    <section class="ecom container">
        <div class="row">
            <div class="col-5 texte">
                <h6>ecommerce</h6>
                <H2>Build Your <br> eCommerce Store <br>
                    With Webtinz</H2>
                <p>Phasellus pulvinar purus ex, sed iaculis lectus</p>
                <a class="getstart" href="{{ route('letstart') }}">Get Started</a>
            </div>
            <div class="col-5 images">
                <img src="{{ asset('assets/images/ILLUSTRATION.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="digitalisation container">
        <div class="row">
            <div class="col text-center ">
                <img src="{{ asset('assets/images/customer-feedback-analysis 1.png') }}" alt="">
            </div>
            <div class="col ">
                <h6>Custom Digitalization</h6>
                <H2>Custom <br> Digitalization as <br> Your Need</H2>
                <p>Phasellus pulvinar purus ex, sed iaculis lectus</p>
                <a class="getstart" href="{{ route('letstart') }}">Get Started</a>
            </div>
        </div>
    </section>
    <section class="templtesweb mb-5">

        <div class="defiletemplates mb-5">
            <div class="text-center">
                <h6>Sample template</h6>
                <h2>Professional Designs</h2>
            </div>
            <div class="arrows d-flex ms-auto">
                <i class="bi bi-chevron-left left me-2"></i>
                <i class="bi bi-chevron-right right"></i>
            </div>
        </div>
        <div class="dashviewtemplate p-5 pt-0">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card" style="border-radius: 15px;border:2px solid #D7D7D7">
                        <img src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (3).png') }}" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="border-radius: 15px;border:2px solid #D7D7D7">
                        <img src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (1).png') }}" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="border-radius: 15px;border:2px solid #D7D7D7">
                        <img src="{{ asset('assets/images/templateswebtinz/Rectangle 41 (2).png') }}" alt="">
                    </div>
                </div>

            </div>
        </div>
        <div class="pagination mt-4 mx-auto">
            <span class="dot "></span>
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>
    <section class="features position-relative ">
        <div class="features-text text-center position-relative">
            <h6>why choose us</h6>
            <H2>Webtinz Features</H2>
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
    <section class="ourpartners container-fluid">
        <div class="ourpartners-text text-center">
            <h6>Who Use</h6>
            <h2>Our Partners</h2>
            <p>Over 50K+ Websites businesses growing with Tektinz</p>
        </div>
        <div class="partnersimage">
            <div class="row justify-content-center mt-4">
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
        <div class="testimonialcards container p-5 mt-3">
            <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center justify-content-center">
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
        <div class="pagination mt-4">
            <span class="dot "></span>
            <span class="dot active"></span>
            <span class="dot"></span>
        </div>
    </section>
    <section class="faq container ">
        <h6>Faqs</h6>
        <h2>Frequently Asked Questions?</h2>
        <div class="faq-section">
            <div class="faq-item">
                <div class="question">
                    <span>What are the monthly costs for each subscription?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 1.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <span>Will my subscription be renewed automatically?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 2.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <span>Am I tied to an ongoing subscription?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 1.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <span>How do I cancel?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 1.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <span>Do I need technical knowledge to build a website?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 1.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <span>Can I start an online store?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 1.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <span>Can I create a business email address?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 1.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <span>My question isn't answered here - what should I do?</span>
                    <i class="bi bi-plus ms-auto"></i>
                </div>
                <div class="answer">
                    <p>Réponse à la question 1.</p>
                </div>
            </div>
        </div>

    </section>

    <section class="pricing container ">
        <div class="row" style="width: 100%;display:flex;justify-content:center;padding:8%">

            <div class="col-3" style="margin-top: 3%; position: relative;">
                <div class="imganim">
                    <img src="{{ asset('assets/images/fontmini/Group-40.png') }}" alt="">
                </div>
                <div class="pricing-circle d-flex flex-column justify-content-center" style="position: absolute; top: 0; left: 10; right: 0; bottom: 0; margin: auto;">
                    <h2>pricing Start @</h2>
                    <h4>CFCA</h4>
                    <h3>5000</h3>
                    <h4>/ Montly</h4>
                </div>
            </div>
            

            <div class="col-7 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <h6>pricing</h6>
                    <h2>Low Pricing</h2>
                    <p class="mb-5">Start building your websites just at CFCA 5000</p>
                    <a class="pricinglink" href="{{ route('payement') }}">See Pricing</a>
                </div>
            </div>
            <div class="col-2 ms-auto sourcelight" style="margin-top:-5%">
                <img src="{{ asset('assets/images/fontmini/Rectangle-8.png') }}" alt="">
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.question').click(function() {
                $(this).toggleClass('active');
                $(this).next('.answer').slideToggle(200);
                $('.question').not(this).removeClass('active').next('.answer').slideUp(200);
            });
        });
    </script>
@endsection
