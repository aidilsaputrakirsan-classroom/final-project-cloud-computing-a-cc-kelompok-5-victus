@extends('layouts.user.app')

@section('title', 'About - Travesta')

@section('content')

    <!-- breadcrumb-wrappe-Section Start -->
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url('{{ asset('assets/images-user/breadcrumb/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>About Us</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('landing') }}">Home</a>
                        </li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About-Section Start -->
    <section class="about-section section-padding fix">
        <div class="container">
            <div class="about-wrapper-2">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img src="{{ asset('assets/images-user/about/03.jpg') }}" alt="img">
                            <div class="shape-image float-bob-y">
                                <img src="{{ asset('assets/images-user/about/04.png') }}" alt="img">
                            </div>
                            <div class="group-image float-bob-x">
                                <img src="{{ asset('assets/images-user/about/group.png') }}" alt="img">
                            </div>
                            <div class="about-image-2">
                                <img src="{{ asset('assets/images-user/about/05.jpg') }}" alt="img">
                                <div class="plane-shape">
                                    <img src="{{ asset('assets/images-user/about/plane-shape2.png') }}" alt="img">
                                </div>
                                <div class="circle-image">
                                    <img src="{{ asset('assets/images-user/about/circle.png') }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">
                                    Get About Us
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".3s">
                                    We're Strived Only For The
                                    Best In The World
                                </h2>
                            </div>
                            <p class="wow fadeInUp wow" data-wow-delay=".5s">
                                There are many variations of passages of available, but the majority have suffered
                                alteration in some form, by injected humour words which don't look even slightly
                                believable injected humour words which
                            </p>
                            <div class="about-items wow fadeInUp wow" data-wow-delay=".3s">
                                <div class="about-icon-items">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images-user/check.png') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Easy Booking <br> System
                                        </h5>
                                    </div>
                                </div>
                                <div class="text">
                                    <p>
                                        Our hotel also prides itself on <br> offering exceptional services.
                                    </p>
                                </div>
                            </div>
                            <div class="about-items wow fadeInUp wow" data-wow-delay=".5s">
                                <div class="about-icon-items">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images-user/check.png') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Easy Booking <br> System
                                        </h5>
                                    </div>
                                </div>
                                <div class="text">
                                    <p>
                                        Our hotel also prides itself on <br> offering exceptional services.
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('landing.blog') }}" class="theme-btn wow fadeInUp wow" data-wow-delay=".7s">Discover
                                More<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel-Feature-Section Start -->
    <section class="travel-feature-section section-padding fix section-bg">
        <div class="shape-1">
            <img src="{{ asset('assets/images-user/plane-shape1.png') }}" alt="img">
        </div>
        <div class="shape-2">
            <img src="{{ asset('assets/images-user/plane-shape2.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="feature-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">
                                    Are you ready to travel?
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                                    World Leading Online Tour Booking Platform
                                </h2>
                            </div>
                            <p class="wow fadeInUp wow" data-wow-delay=".3s">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable.
                            </p>
                            <div class="feature-area">
                                <div class="line-shape">
                                    <img src="{{ asset('assets/images-user/line-shape.png') }}" alt="img">
                                </div>
                                <div class="feature-items wow fadeInUp wow" data-wow-delay=".5s">
                                    <div class="feature-icon-item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/images-user/icon/08.svg') }}" alt="img">
                                        </div>
                                        <div class="content">
                                            <h5>
                                                Most Adventure <Br>
                                                Tour Ever
                                            </h5>
                                        </div>
                                    </div>
                                    <ul class="circle-icon">
                                        <li>
                                            <i class="fa-solid fa-badge-check"></i>
                                        </li>
                                        <li>
                                            There are many variations of <br>
                                            passages of available,
                                        </li>
                                    </ul>
                                </div>
                                <div class="feature-items wow fadeInUp wow" data-wow-delay=".7s">
                                    <div class="feature-icon-item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/images-user/icon/09.svg') }}" alt="img">
                                        </div>
                                        <div class="content">
                                            <h5>
                                                Real Tour Starts <br>
                                                from Here
                                            </h5>
                                        </div>
                                    </div>
                                    <ul class="circle-icon">
                                        <li>
                                            <i class="fa-solid fa-badge-check"></i>
                                        </li>
                                        <li>
                                            There are many variations of <br>
                                            passages of available,
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('landing.blog') }}" class="theme-btn wow fadeInUp wow" data-wow-delay=".9s">Contact US<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-image wow fadeInUp wow" data-wow-delay=".3s">
                            <img src="{{ asset('assets/images-user/man-image.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter-Section Start -->
    <section class="counter-section theme-bg fix section-bg-3">
        <div class="container">
            <div class="counter-wrapper-3">
                <div class="counter-items wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="icon">
                        <img src="{{ asset('assets/images-user/icon/35.svg') }}" alt="img">
                    </div>
                    <div class="counter-content">
                        <h2><span class="count">100,000</span>+</h2>
                        <p>Our Explorers</p>
                    </div>
                </div>
                <div class="counter-items wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="icon">
                        <img src="{{ asset('assets/images-user/icon/36.svg') }}" alt="img">
                    </div>
                    <div class="counter-content">
                        <h2><span class="count">5,000</span>+</h2>
                        <p>Destinations</p>
                    </div>
                </div>
                <div class="counter-items wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="icon">
                        <img src="{{ asset('assets/images-user/icon/37.svg') }}" alt="img">
                    </div>
                    <div class="counter-content">
                        <h2><span class="count">10,000</span>+</h2>
                        <p>More Trips</p>
                    </div>
                </div>
                <div class="counter-items style-2 wow fadeInUp wow" data-wow-delay=".8s">
                    <div class="icon">
                        <img src="{{ asset('assets/images-user/icon/38.svg') }}" alt="img">
                    </div>
                    <div class="counter-content">
                        <h2><span class="count">2,000</span>+</h2>
                        <p>Luxary Hotel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section Start -->
    <section class="team-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">
                    Meet with Guide
                </span>
                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">Tour Guide</h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="team-card-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/images-user/team/01.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a href="#">Darlene Robertson</a></h4>
                            <p>Tourist Guide</p>
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="team-card-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/images-user/team/02.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a href="#">Leslie Alexander</a></h4>
                            <p>Tourist Guide</p>
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="team-card-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/images-user/team/03.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a href="#">Ralph Edwards</a></h4>
                            <p>Tourist Guide</p>
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".8s">
                    <div class="team-card-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/images-user/team/04.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a href="#">Kathryn Murphy</a></h4>
                            <p>Tourist Guide</p>
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial-Section Start -->
    <section class="testimonial-section section-padding fix bg-cover"
        style="background-image: url('{{ asset('assets/images-user/testimonial/testimonial-bg.jpg') }}');">
        <div class="container">
            <div class="testimonial-wrapper-3">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6 wow fadeInUp wow" data-wow-delay=".3s">
                        <div class="testimonial-image">
                            <img src="{{ asset('assets/images-user/testimonial/03.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">
                                    Testimonial
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                                    Travelers Love Our locals
                                </h2>
                            </div>
                            <div class="swiper testimonial-slider3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial-card-items">
                                            <div class="client-info-items">
                                                <div class="client-info">
                                                    <div class="client-image">
                                                        <img src="{{ asset('assets/images-user/testimonial/client-4.png') }}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h4>
                                                            Kathryn Murphy
                                                        </h4>
                                                        <p>
                                                            Web Designer
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="37"
                                                        viewBox="0 0 50 37" fill="none">
                                                        <path d="M0 0V37L18.75 18.5V0H0ZM31.25 0V37L50 18.5V0H31.25Z"
                                                            fill="#1CA8CB" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p>
                                                There are many variations of passages of the Lorem Ipsum available, but
                                                the majority have suffered alteration in some form, by injected humour,
                                                or randomised words which don't look even slightly believable.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- additional slides omitted for brevity -->
                                </div>
                            </div>
                            <div class="array-button">
                                <button class="array-prev">
                                    <i class="fa-regular fa-arrow-up"></i>
                                </button>
                                <button class="array-next">
                                    <i class="fa-regular fa-arrow-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Banner Section Start (kept minimal) -->
    <div class="instagram-banner fix section-padding">
        <div class="instagram-wrapper">
            <h2 class="text-center wow fadeInUp" data-wow-delay=".3s">Follow Instagram</h2>
            <div class="swiper instagram-banner-slider">
                <div class="swiper-wrapper">
                    <!-- slides omitted for brevity -->
                </div>
            </div>
        </div>
    </div>

@endsection
