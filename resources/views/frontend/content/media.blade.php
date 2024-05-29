@extends('frontend.layout.main')

@section('content')
<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area"
        style="background-image: url({{ asset('assets-fe/assets/theme/images/media.jpg') }});width: 100%; height: 600px;">
        <div class="container">
            <div class="col-md-12 text-center">
                <h1 data-duration-in=".5" data-animation-in="fadeInUp" data-delay-in=".1"
                    style="font-size: 128px; font-family: 'Zen Antique Soft', sans-serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                    <span
                        style="font-size: 96px; font-family: 'Cormorant Garamond', serif; font-weight: normal; margin-bottom: 10px;">MEDIA</span>
                </h1>
            </div>
        </div>
    </div>
</div>
    <!-- Start Portfolio Section
      =========================================== -->

    <section class="portfolio section-sm" id="portfolio">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-12">
                            <div class="filtr-container">
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href={{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}">our priest</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design, ios">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/persembahann.png') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href="{{ asset('assets-fe/assets/theme/images/persembahann.png') }}"
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/persembahann.png') }}">offering</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href={{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}">our priest</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href={{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}">our priest</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href={{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}">our priest</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href={{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}">our priest</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href={{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}">our priest</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, design">
                                    <div class="portfolio-block">
                                        <img class="img-fluid" src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="">
                                        <div class="caption">
                                            <a class="search-icon" href={{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}
                                                data-lightbox="image-1">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </a>
                                            <h4><a href="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}">our priest</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /end col-lg-12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- End section -->
    <!-- Start Testimonial
            =========================================== -->

    <section class="testimonial section" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- testimonial wrapper -->
                    <div class="testimonial-slider">
                        <!-- testimonial single -->
                        <div class="item text-center">
                            <i class="tf-ion-chatbubbles"></i>
                            <!-- client info -->
                            <div class="client-details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos
                                    earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates
                                    alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                            </div>
                            <!-- /client info -->
                            <!-- client photo -->
                            <div class="client-thumb">
                                <img loading="lazy" src="images/client-logo/clients-1.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="client-meta">
                                <h3>William Martin</h3>
                                <span>CEO , Company Name</span>
                            </div>
                            <!-- /client photo -->
                        </div>
                        <!-- /testimonial single -->

                        <!-- testimonial single -->
                        <div class="item text-center">
                            <i class="tf-ion-chatbubbles"></i>
                            <!-- client info -->
                            <div class="client-details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos
                                    earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates
                                    alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                            </div>
                            <!-- /client info -->
                            <!-- client photo -->
                            <div class="client-thumb">
                                <img loading="lazy" src="images/client-logo/clients-2.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Emma Harrison</h3>
                                <span>CEO , Company Name</span>
                            </div>
                            <!-- /client photo -->
                        </div>
                        <!-- /testimonial single -->

                        <!-- testimonial single -->
                        <div class="item text-center">
                            <i class="tf-ion-chatbubbles"></i>
                            <!-- client info -->
                            <div class="client-details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos
                                    earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates
                                    alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                            </div>
                            <!-- /client info -->
                            <!-- client photo -->
                            <div class="client-thumb">
                                <img loading="lazy" src="images/client-logo/clients-3.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Alexander Lucas</h3>
                                <span>CEO , Company Name</span>
                            </div>
                            <!-- /client photo -->
                        </div>
                        <!-- /testimonial single -->
                    </div>
                </div> <!-- end col lg 12 -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End Section -->
@endsection
