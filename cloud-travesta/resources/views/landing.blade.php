<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="pixel-drop">
    <meta name="description" content="Turmet - Travel & Tour Agency HTML Template">
    <title>Turmet - Travel & Tour Agency HTML Template</title>

    {{-- Menggunakan helper 'asset' untuk memuat file dari folder 'public' --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepickerboot.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>

    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="T" class="letters-loading">
                    T
                </span>
                <span data-text-preloader="U" class="letters-loading">
                    U
                </span>
                <span data-text-preloader="R" class="letters-loading">
                    R
                </span>
                <span data-text-preloader="M" class="letters-loading">
                    M
                </span>
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
                <span data-text-preloader="T" class="letters-loading">
                    T
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <button id="back-top" class="back-to-top">
        <i class="fa-regular fa-arrow-up"></i>
    </button>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.html">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/logo/black-logo.svg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                        feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Main Street, Melbourne, Australia</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="mailto:info@example.com"><span
                                            class="mailto:info@example.com">info@example.com</span></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+11002345909">+11002345909</a>
                                </div>
                            </li>
                        </ul>
                        <div class="header-button mt-4">
                            <a href="contact.html" class="theme-btn"> Request A Quote <i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <header class="header-section-10">
        <div class="header-top-section-new">
            <div class="container-fluid">
                <div class="header-top-wrapper-new">
                    <div class="social-icon d-flex align-items-center">
                        <span>Follow Us</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <ul class="top-right">
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:info@touron.com">info@touron.com</a>
                        </li>
                        <li>
                            <i class="fa-regular fa-clock"></i>
                            Sun to Friday: 8.00 am - 7.00 pm, Austria
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:+256214203215">+256 214 203 215</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="header-sticky" class="header-11">
            <div class="container-fluid">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="logo">
                            <a href="index.html" class="header-logo">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/logo/white-log.svg') }}" alt="logo-img">
                            </a>
                            <div class="logo-2">
                                <a href="index.html">
                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                    <img src="{{ asset('assets/img/logo/black-logo.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="has-dropdown active menu-thumb">
                                                <a href="index.html">
                                                    Home
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </a>
                                                <ul class="submenu has-homemenu">
                                                    <li>
                                                        <div class="homemenu-items">
                                                            <div class="homemenu">
                                                                <div class="homemenu-thumb">
                                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                                    <img src="{{ asset('assets/img/header/home-1.jpg') }}"
                                                                        alt="img">
                                                                    <div class="demo-button">
                                                                        <a href="index.html" class="theme-btn">
                                                                            Multi Page
                                                                        </a>
                                                                        <a href="index-one-page.html"
                                                                            class="theme-btn">
                                                                            One Page
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="homemenu-content text-center">
                                                                    <h4 class="homemenu-title">
                                                                        Tour Booking
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="homemenu">
                                                                <div class="homemenu-thumb mb-15">
                                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                                    <img src="{{ asset('assets/img/header/home-2.jpg') }}"
                                                                        alt="img">
                                                                    <div class="demo-button">
                                                                        <a href="index-2.html" class="theme-btn">
                                                                            Multi Page
                                                                        </a>
                                                                        <a href="index-two-page.html"
                                                                            class="theme-btn">
                                                                            One Page
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="homemenu-content text-center">
                                                                    <h4 class="homemenu-title">
                                                                        Travel Booking
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="homemenu">
                                                                <div class="homemenu-thumb mb-15">
                                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                                    <img src="{{ asset('assets/img/header/home-3.jpg') }}"
                                                                        alt="img">
                                                                    <div class="demo-button">
                                                                        <a href="index-3.html" class="theme-btn">
                                                                            Multi Page
                                                                        </a>
                                                                        <a href="index-three-page.html"
                                                                            class="theme-btn">
                                                                            One Page
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="homemenu-content text-center">
                                                                    <h4 class="homemenu-title">
                                                                        Flight Booking
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown active d-xl-none">
                                                <a href="team.html" class="border-none">
                                                    Home
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="index.html">Home 01</a></li>
                                                    <li><a href="index-2.html">Home 02</a></li>
                                                    <li><a href="index-3.html">Home 03</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="about.html">About Us</a>
                                            </li>
                                            <li>
                                                <a href="destination-details.html">
                                                    Destinations
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="destination.html">our Destination</a></li>
                                                    <li><a href="destination-details.html">Destination Details</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="tour-details.html">
                                                    Tour
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="tour.html">Our Tour</a></li>
                                                    <li><a href="tour-details.html">Tour Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="news.html">
                                                    Pages
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="activities.html">Activities</a></li>
                                                    <li><a href="activities-details.html">Activities Details</a></li>
                                                    <li><a href="team.html">Our Team</a></li>
                                                    <li><a href="team-details.html">Team Details</a></li>
                                                    <li><a href="faq.html">Our Faq</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="news-details.html">
                                                    Blog
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="news.html">Blog Grid</a></li>
                                                    <li><a href="news-classic.html">Blog Classic</a></li>
                                                    <li><a href="news-details.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact Us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <a href="#0" class="search-trigger search-icon"><i
                                    class="fa-regular fa-magnifying-glass"></i></a>
                            <a href="contact.html" class="theme-btn"> Request A Quote <i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar__toggle">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="hero-section">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-1">
                        {{-- Menggunakan 'asset' untuk background-image --}}
                        <div class="hero-bg bg-cover"
                            style="background-image: url({{ asset('assets/img/hero/01.jpg') }});"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="hero-content">
                                        <div class="sub-title">
                                            Get unforgettable pleasure with us
                                        </div>
                                        <h1>
                                            Let’s make your best <br> trip with us
                                        </h1>
                                        <div class="booking-list-area">
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-1.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Location</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>Australia</option>
                                                            <option>India</option>
                                                            <option>Italy</option>
                                                            <option>Japan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-2.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Activities Type</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option> Activities Type</option>
                                                            <option> Adventure 02</option>
                                                            <option>Adventure 03</option>
                                                            <option> Adventure 04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-3.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Activate Day</h6>
                                                    <div class="form-clt">
                                                        <input type="date" id="date1" name="date1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-3.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Traveler</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>01</option>
                                                            <option>02</option>
                                                            <option>03</option>
                                                            <option>04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="theme-btn" type="submit">Search</button>
                                        </div>
                                    </div>
                                    <div class="counter-area">
                                        <div class="counter-items">
                                            <div class="counter-text">
                                                <h2><span class="count">20.5</span>k</h2>
                                                <p>Featured Projects</p>
                                            </div>
                                            <div class="counter-text">
                                                <h2><span class="count">100.5</span>k</h2>
                                                <p>Luxury Houses</p>
                                            </div>
                                            <div class="counter-text">
                                                <h2><span class="count">150.5</span>k</h2>
                                                <p>Satisficed Clients</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-1">
                        {{-- Menggunakan 'asset' untuk background-image --}}
                        <div class="hero-bg bg-cover"
                            style="background-image: url({{ asset('assets/img/hero/02.jpg') }});"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="hero-content">
                                        <div class="sub-title">
                                            Get unforgettable pleasure with us
                                        </div>
                                        <h1>
                                            Let’s make your best <br> trip with us
                                        </h1>
                                        <div class="booking-list-area">
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-1.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Location</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>Australia</option>
                                                            <option>India</option>
                                                            <option>Italy</option>
                                                            <option>Japan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-2.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Activities Type</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option> Activities Type</option>
                                                            <option> Adventure 02</option>
                                                            <option>Adventure 03</option>
                                                            <option> Adventure 04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-3.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Activate Day</h6>
                                                    <div class="form-clt">
                                                        <input type="date" id="date2" name="date1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-3.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Traveler</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>01</option>
                                                            <option>02</option>
                                                            <option>03</option>
                                                            <option>04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="theme-btn" type="submit">Search</button>
                                        </div>
                                    </div>
                                    <div class="counter-area">
                                        <div class="counter-items">
                                            <div class="counter-text">
                                                <h2><span class="count">20.5</span>k</h2>
                                                <p>Featured Projects</p>
                                            </div>
                                            <div class="counter-text">
                                                <h2><span class="count">100.5</span>k</h2>
                                                <p>Luxury Houses</p>
                                            </div>
                                            <div class="counter-text">
                                                <h2><span class="count">150.5</span>k</h2>
                                                <p>Satisficed Clients</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-1">
                        {{-- Menggunakan 'asset' untuk background-image --}}
                        <div class="hero-bg bg-cover"
                            style="background-image: url({{ asset('assets/img/hero/03.jpg') }});"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="hero-content">
                                        <div class="sub-title">
                                            Get unforgettable pleasure with us
                                        </div>
                                        <h1>
                                            Let’s make your best <br> trip with us
                                        </h1>
                                        <div class="booking-list-area">
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-1.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Location</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>Australia</option>
                                                            <option>India</option>
                                                            <option>Italy</option>
                                                            <option>Japan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-2.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Activities Type</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option> Activities Type</option>
                                                            <option> Adventure 02</option>
                                                            <option>Adventure 03</option>
                                                            <option> Adventure 04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-3.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Activate Day</h6>
                                                    <div class="form-clt">
                                                        <input type="date" id="date3" name="date1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                                    <img src="{{ asset('assets/img/hero/icon-3.png') }}"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Traveler</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>01</option>
                                                            <option>02</option>
                                                            <option>03</option>
                                                            <option>04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="theme-btn" type="submit">Search</button>
                                        </div>
                                    </div>
                                    <div class="counter-area">
                                        <div class="counter-items">
                                            <div class="counter-text">
                                                <h2><span class="count">20.5</span>k</h2>
                                                <p>Featured Projects</p>
                                            </div>
                                            <div class="counter-text">
                                                <h2><span class="count">100.5</span>k</h2>
                                                <p>Luxury Houses</p>
                                            </div>
                                            <div class="counter-text">
                                                <h2><span class="count">150.5</span>k</h2>
                                                <p>Satisficed Clients</p>
                                            </div>
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

    <section class="feature-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="feature-card-items">
                        <div class="icon">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/icon/01.svg') }}" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                A Lot of Discount
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="feature-card-items">
                        <div class="icon bg-color">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/icon/02.svg') }}" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                Best Guide
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="feature-card-items">
                        <div class="icon">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/icon/03.svg') }}" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                24/7 Support
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".8s">
                    <div class="feature-card-items">
                        <div class="icon">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/icon/04.svg') }}" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                Travel Management
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="destination-category-section section-padding pt-0">
        <div class="plane-shape float-bob-y">
            {{-- Menggunakan 'asset' untuk gambar --}}
            <img src="{{ asset('assets/img/destination/shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">Wonderful Place For You</span>
                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                    Browse By Destination Category
                </h2>
            </div>
        </div>
        <div class="container-fluid">

            <div class="swiper category-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="destination-category-item">
                            <div class="category-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/destination/category1.jpg') }}" alt="img">
                                <div class="category-content">
                                    <h5>
                                        <a href="destination-details.html">Adventure</a>
                                    </h5>
                                    <p>6 Tour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="destination-category-item">
                            <div class="category-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/destination/category2.jpg') }}" alt="img">
                                <div class="category-content">
                                    <h5>
                                        <a href="destination-details.html">Adventure</a>
                                    </h5>
                                    <p>6 Tour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="destination-category-item">
                            <div class="category-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/destination/category3.jpg') }}" alt="img">
                                <div class="category-content">
                                    <h5>
                                        <a href="destination-details.html">Adventure</a>
                                    </h5>
                                    <p>6 Tour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="destination-category-item">
                            <div class="category-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/destination/category4.jpg') }}" alt="img">
                                <div class="category-content">
                                    <h5>
                                        <a href="destination-details.html">Adventure</a>
                                    </h5>
                                    <p>6 Tour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="destination-category-item">
                            <div class="category-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/destination/category5.jpg') }}" alt="img">
                                <div class="category-content">
                                    <h5>
                                        <a href="destination-details.html">Adventure</a>
                                    </h5>
                                    <p>6 Tour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-dot4 mt-5">
                <div class="dot"></div>
            </div>
        </div>
    </section>

    {{-- Menggunakan 'asset' untuk background-image --}}
    <section class="about-section section-padding  fix bg-cover"
        style="background-image: url({{ asset('assets/img/about/about-bg.jpg') }});">
        <div class="right-shape float-bob-x">
            {{-- Menggunakan 'asset' untuk gambar --}}
            <img src="{{ asset('assets/img/about/right-shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="about-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/about/01.png') }}" alt="img"
                                class="wow img-custom-anim-left">
                            <div class="border-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/about/border.png') }}" alt="">
                            </div>
                            <div class="vdeo-item">
                                <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup">
                                    <i class="fa-duotone fa-play"></i>
                                </a>
                                <h5>WACTH VIDEO </h5>
                            </div>
                            <div class="about-image-2">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/about/02.png') }}" alt="img"
                                    class="wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                <div class="plane-shape float-bob-y">
                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                    <img src="{{ asset('assets/img/about/plane-shape.png') }}" alt="">
                                </div>
                                <div class="about-tour">
                                    <div class="icon">
                                        {{-- Menggunakan 'asset' untuk gambar --}}
                                        <img src="{{ asset('assets/img/icon/10.svg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h4>Luxury Tour</h4>
                                        <span>25 years of Experience</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">Let’s Go Together</span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                                    Great opportunity for <br>
                                    adventure & travels
                                </h2>
                            </div>
                            <div class="about-area mt-4 mt-md-0">
                                <div class="line-image">
                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                    <img src="{{ asset('assets/img/about/Line-image.png') }}" alt="img">
                                </div>
                                <div class="about-items wow fadeInUp wow" data-wow-delay=".3s">
                                    <div class="icon">
                                        {{-- Menggunakan 'asset' untuk gambar --}}
                                        <img src="{{ asset('assets/img/icon/05.svg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Exclusive Trip
                                        </h5>
                                        <p>
                                            There are many variations of passages <br> of available, but the majority
                                        </p>
                                    </div>
                                </div>
                                <div class="about-items wow fadeInUp wow" data-wow-delay=".5s">
                                    <div class="icon">
                                        {{-- Menggunakan 'asset' untuk gambar --}}
                                        <img src="{{ asset('assets/img/icon/06.svg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Safety first always
                                        </h5>
                                        <p>
                                            There are many variations of passages <br> of available, but the majority
                                        </p>
                                    </div>
                                </div>
                                <div class="about-items wow fadeInUp wow" data-wow-delay=".7s">
                                    <div class="icon">
                                        {{-- Menggunakan 'asset' untuk gambar --}}
                                        <img src="{{ asset('assets/img/icon/07.svg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Professional Guide
                                        </h5>
                                        <p>
                                            There are many variations of passages <br> of available, but the majority
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section section-padding">
        <div class="mobile-shape">
            {{-- Menggunakan 'asset' untuk gambar --}}
            <img src="{{ asset('assets/img/mobile.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".3s">
                    <div class="cta-items">
                        <div class="cta-text">
                            <h2>35% OFF</h2>
                            <p>
                                Explore The World tour <br>
                                Hotel Booking.
                            </p>
                        </div>
                        <a href="tour-details.html" class="theme-btn">BOOK NOW <i
                                class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        <div class="cta-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/bag-shape.png') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".5s">
                    <div class="cta-items style-2">
                        <div class="cta-text">
                            <h2>35% OFF</h2>
                            <p>
                                On Flight Ticket Grab <br>
                                This Now.
                            </p>
                        </div>
                        <a href="tour-details.html" class="theme-btn">BOOK NOW <i
                                class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        <div class="cta-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/plane-shape.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-destination-section section-padding pt-0">
        <div class="car-shape float-bob-x">
            {{-- Menggunakan 'asset' untuk gambar --}}
            <img src="{{ asset('assets/img/destination/car.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="section-title-area justify-content-between">
                <div class="section-title">
                    <span class="sub-title wow fadeInUp">
                        Best Recommended Places
                    </span>
                    <h2 class="wow fadeInUp wow" data-wow-delay=".3s">
                        Popular Destination we offer for all
                    </h2>
                </div>
                <a href="tour-details.html" class="theme-btn wow fadeInUp wow" data-wow-delay=".5s">View All Tour<i
                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/01.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Brooklyn Beach Resort Tour
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/02.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Pak Chumphon Town Tour
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/03.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Java & Bali One Life Adventure
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".8s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/04.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Places To Travel In November
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/05.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Brooklyn Beach Resort Tour
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/06.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Pak Chumphon Town Tour
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/07.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Brooklyn Beach Resort Tour
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".8s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/destination/08.jpg') }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    Java & Bali One Life Adventure
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    10 Days
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li>
                            </ul>
                            <div class="price">
                                <h6>$59.00<span>/Per day</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Menggunakan 'asset' untuk background-image --}}
    <section class="deals-offer-section section-padding fix bg-cover"
        style="background-image: url({{ asset('assets/img/offer/bg.jpg') }});">
        <div class="deals-offer-wrapper">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="price-items">
                        <div class="price-image wow fadeInUp wow" data-wow-delay=".2s">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/offer/price.png') }}" alt="img">
                        </div>
                        <div class="coming-soon-timer">
                            <div class="timer-content wow fadeInUp" data-wow-delay=".2s">
                                <h2 id="day">00</h2>
                                <p>Days</p>
                            </div>
                            <div class="timer-content wow fadeInUp" data-wow-delay=".4s">
                                <h2 id="hour">00</h2>
                                <p>Hours</p>
                            </div>
                            <div class="timer-content wow fadeInUp" data-wow-delay=".6s">
                                <h2 id="min">00</h2>
                                <p>Minute</p>
                            </div>
                            <div class="timer-content wow fadeInUp" data-wow-delay=".8s">
                                <h2 id="sec">00</h2>
                                <p>Seconds</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="deals-offer-content">
                        <span class="sub-title wow fadeInUp">Deals & Offers</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                            Adventure & Travel <br>
                            With Your Family
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            Nullam dignissim, ante scelerisque the is euismod fermentum <br>
                            odio sem semper the is erat, a feugiat leo urna eget eros. <br>
                            Duis Aenean a imperdiet risus.
                        </p>
                        <a href="tour-details.html" class="theme-btn wow fadeInUp" data-wow-delay=".7s">Book Now<i
                                class="fa-sharp fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="activities-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">Choose Your Activities</span>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">
                    Our Best Activities
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="activities-card-items">
                        <div class="activities-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/activities/01.jpg') }}" alt="img">
                        </div>
                        <div class="activities-content">
                            <h3>
                                <a href="activities-details.html">Hiking & Trekking</a>
                            </h3>
                            <p>
                                Nullam dignissim, ante scelerisq <br>
                                euismod fermentum
                            </p>
                            <a href="activities-details.html" class="theme-btn style-3">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="activities-card-items">
                        <div class="activities-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/activities/02.jpg') }}" alt="img">
                        </div>
                        <div class="activities-content">
                            <h3>
                                <a href="activities-details.html">City Tours</a>
                            </h3>
                            <p>
                                Nullam dignissim, ante scelerisq <br>
                                euismod fermentum
                            </p>
                            <a href="activities-details.html" class="theme-btn style-3">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="activities-card-items">
                        <div class="activities-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/activities/03.jpg') }}" alt="img">
                        </div>
                        <div class="activities-content">
                            <h3>
                                <a href="activities-details.html">Forest Tours</a>
                            </h3>
                            <p>
                                Nullam dignissim, ante scelerisq <br>
                                euismod fermentum
                            </p>
                            <a href="activities-details.html" class="theme-btn style-3">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="activities-card-items">
                        <div class="activities-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/activities/04.jpg') }}" alt="img">
                        </div>
                        <div class="activities-content">
                            <h3>
                                <a href="activities-details.html">Museum Tours</a>
                            </h3>
                            <p>
                                Nullam dignissim, ante scelerisq <br>
                                euismod fermentum
                            </p>
                            <a href="activities-details.html" class="theme-btn style-3">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-section-2">
        <div class="container-fluid">
            <div class="swiper gallery-slider-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="gallery-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/gallery/01.jpg') }}" alt="img">
                            <div class="gallery-content">
                                <a href="{{ asset('assets/img/gallery/01.jpg') }}" class="icon image-popup">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h5>
                                        <a href="tour-details.html">Brooklyn Beach</a>
                                    </h5>
                                    <p>
                                        <i class="fa-thin fa-location-dot"></i>
                                        Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/gallery/02.jpg') }}" alt="img">
                            <div class="gallery-content">
                                <a href="{{ asset('assets/img/gallery/02.jpg') }}" class="icon image-popup">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h5>
                                        <a href="tour-details.html">Brooklyn Beach</a>
                                    </h5>
                                    <p>
                                        <i class="fa-thin fa-location-dot"></i>
                                        Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/gallery/03.jpg') }}" alt="img">
                            <div class="gallery-content">
                                <a href="{{ asset('assets/img/gallery/03.jpg') }}" class="icon image-popup">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h5>
                                        <a href="tour-details.html">Brooklyn Beach</a>
                                    </h5>
                                    <p>
                                        <i class="fa-thin fa-location-dot"></i>
                                        Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/gallery/04.jpg') }}" alt="img">
                            <div class="gallery-content">
                                <a href="{{ asset('assets/img/gallery/04.jpg') }}" class="icon image-popup">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h5>
                                        <a href="tour-details.html">Brooklyn Beach</a>
                                    </h5>
                                    <p>
                                        <i class="fa-thin fa-location-dot"></i>
                                        Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/gallery/05.jpg') }}" alt="img">
                            <div class="gallery-content">
                                <a href="{{ asset('assets/img/gallery/05.jpg') }}" class="icon image-popup">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h5>
                                        <a href="tour-details.html">Brooklyn Beach</a>
                                    </h5>
                                    <p>
                                        <i class="fa-thin fa-location-dot"></i>
                                        Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <section class="testimonial-section-2 section-padding fix">
        <div class="container">
            <div class="testimonial-wrapper-2">
                <div class="section-title text-center">
                    <span class="sub-title wow fadeInUp">Our Testimonial</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">
                        What Our Client Say
                    </h2>
                </div>
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-card-items-2">
                                <div class="testimonial-image">
                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                    <img src="{{ asset('assets/img/testimonial/01.png') }}" alt="img">
                                    <div class="icon">
                                        <i class="fa-solid fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Nullam dignissim, ante scelerisque the is euismod fermentum
                                        odio sem semper the is erat, a feugiat leo urna eget eros.
                                        Duis Aenean a imperdiet risus.
                                    </p>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h5>Leslie Alexander</h5>
                                    <span>Founder & CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-card-items-2">
                                <div class="testimonial-image">
                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                    <img src="{{ asset('assets/img/testimonial/02.png') }}" alt="img">
                                    <div class="icon">
                                        <i class="fa-solid fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Nullam dignissim, ante scelerisque the is euismod fermentum
                                        odio sem semper the is erat, a feugiat leo urna eget eros.
                                        Duis Aenean a imperdiet risus.
                                    </p>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h5>Leslie Alexander</h5>
                                    <span>Founder & CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-card-items-2">
                                <div class="testimonial-image">
                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                    <img src="{{ asset('assets/img/testimonial/01.png') }}" alt="img">
                                    <div class="icon">
                                        <i class="fa-solid fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Nullam dignissim, ante scelerisque the is euismod fermentum
                                        odio sem semper the is erat, a feugiat leo urna eget eros.
                                        Duis Aenean a imperdiet risus.
                                    </p>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h5>Leslie Alexander</h5>
                                    <span>Founder & CEO</span>
                                </div>
                                Terdapat *error* pada file HTML Anda di baris 1083. Sepertinya tag `
                            </div>` penutup hilang. Namun, saya akan lanjutkan konversinya dengan asumsi struktur yang
                            ada.

                            ```php
                            {{-- ... (lanjutan dari atas) ... --}}
                            <div class="testimonial-card-items-2">
                                <div class="testimonial-image">
                                    {{-- Menggunakan 'asset' untuk gambar --}}
                                    <img src="{{ asset('assets/img/testimonial/01.png') }}" alt="img">
                                    <div class="icon">
                                        <i class="fa-solid fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <p>
                                        “Nullam dignissim, ante scelerisque the is euismod fermentum
                                        odio sem semper the is erat, a feugiat leo urna eget eros.
                                        Duis Aenean a imperdiet risus.
                                    </p>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h5>Leslie Alexander</h5>
                                    <span>Founder & CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-dot-2">
                    <div class="dot"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="brand-section section-padding pt-0">
        <div class="container">
            <div class="brand-wrapper">
                <div class="swiper brand-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/brand/01.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/brand/02.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/brand/03.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/brand/04.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/brand/05.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">Our News & Blog</span>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">
                    Our Latest News & Blog
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="blog-card-items">
                        <div class="blog-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/blog/01.jpg') }}" alt="img">
                            <div class="date">
                                <h5>15</h5>
                                <span>JUNE</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-user"></i>
                                    By-Admin
                                </li>
                                <li>
                                    <i class="fa-thin fa-comments"></i>
                                    2 Comments
                                </li>
                            </ul>
                            <h5>
                                <a href="news-details.html">
                                    Travel Safety Tips For Your <br>
                                    Next Trip
                                </a>
                            </h5>
                            <a href="news-details.html" class="theme-btn style-3">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="blog-card-items">
                        <div class="blog-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/blog/02.jpg') }}" alt="img">
                            <div class="date">
                                <h5>15</h5>
                                <span>JUNE</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-user"></i>
                                    By-Admin
                                </li>
                                <li>
                                    <i class="fa-thin fa-comments"></i>
                                    2 Comments
                                </li>
                            </ul>
                            <h5>
                                <a href="news-details.html">
                                    The Best Way To Save Your <br>
                                    Money
                                </a>
                            </h5>
                            <a href="news-details.html" class="theme-btn style-3">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="blog-card-items">
                        <div class="blog-image">
                            {{-- Menggunakan 'asset' untuk gambar --}}
                            <img src="{{ asset('assets/img/blog/03.jpg') }}" alt="img">
                            <div class="date">
                                <h5>15</h5>
                                <span>JUNE</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-user"></i>
                                    By-Admin
                                </li>
                                <li>
                                    <i class="fa-thin fa-comments"></i>
                                    2 Comments
                                </li>
                            </ul>
                            <h5>
                                <a href="news-details.html">
                                    The Complete Guide To The <br>
                                    Best Travel
                                </a>
                            </h5>
                            <a href="news-details.html" class="theme-btn style-3">Read More<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-section section-padding">
        <div class="footer-bg-shape">
            {{-- Menggunakan 'asset' untuk gambar --}}
            <img src="{{ asset('assets/img/footer-bg.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="footer-widgets-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                {{-- Menggunakan 'asset' untuk gambar --}}
                                <img src="{{ asset('assets/img/logo/footer-logo.svg') }}" alt="logo-img">
                            </div>
                            <div class="footer-content">
                                <p>
                                    Nullam dignissim, ante scelerisq
                                    euismod fermentum odio sem
                                    semper the is erat.
                                </p>
                                <div class="social-icon d-flex align-items-center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Quick Link</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="about.html">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="tour.html">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Tour Type
                                    </a>
                                </li>
                                <li>
                                    <a href="destination.html">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Destination
                                    </a>
                                </li>
                                <li>
                                    <a href="news.html">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Tour Guide
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Contact Info</h3>
                            </div>
                            <div class="footer-contact-items">
                                <div class="contact-item-card">
                                    <div class="icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="content">
                                        <p>South Korea, Seoul</p>
                                    </div>
                                </div>
                                <div class="contact-item-card">
                                    <div class="icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <a href="mailto:info@example.com">info@example.com</a>
                                    </div>
                                </div>
                                <div class="contact-item-card">
                                    <div class="icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="content">
                                        <a href="tel:+123456789">+123 456 789</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Newsletter</h3>
                            </div>
                            <div class="footer-content">
                                <p>
                                    Nullam dignissim, ante scelerisq
                                    euismod fermentum odio.
                                </p>
                                <form class="newsletter-form">
                                    <input type="email" placeholder="Email Address">
                                    <button class="theme-btn" type="submit">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-wrapper d-flex align-items-center justify-content-between">
                    <p class="wow fadeInUp" data-wow-delay=".2s">
                        © All Copyright <span>2024</span> by Turmet
                    </p>
                    <ul class="bottom-list wow fadeInUp" data-wow-delay=".5s">
                        <li>Terms of use</li>
                        <li>Privacy Environmental Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
