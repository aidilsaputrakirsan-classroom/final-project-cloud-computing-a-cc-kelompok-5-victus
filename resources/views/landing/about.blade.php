@extends('layouts.user.app')

@section('title', 'Tentang Kami - Travesta')

@section('content')

    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url('{{ asset('assets/images-user/breadcrumb/breadcrumb1.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Tentang Kami</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('landing') }}">Beranda</a>
                        </li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Tentang Kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section section-padding fix">
        <div class="container">
            <div class="about-wrapper-2">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img src="{{ asset('assets/images-user/about/03besar.jpg') }}" alt="img"
                                style="width: 100%; height: 450px; object-fit: cover; border-radius: 10px;">
                            <div class="about-image-2">
                                <img src="{{ asset('assets/images-user/about/05kecil.jpg') }}" alt="img"
                                    style="width: 250px; height: 300px; object-fit: cover; border-radius: 10px;">
                                <div class="plane-shape">
                                    <img src="{{ asset('assets/images-user/about/plane-shape2.png') }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">
                                    Tentang Travesta
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".3s">
                                    Platform Rekomendasi Wisata di Indonesia
                                </h2>
                            </div>
                            <p class="wow fadeInUp wow" data-wow-delay=".5s">
                                Pariwisata merupakan salah satu sektor penting dalam perekonomian Indonesia, dengan ribuan
                                destinasi menarik yang tersebar dari Sabang hingga Merauke. Namun, masih banyak
                                masyarakat yang kesulitan menemukan informasi destinasi wisata yang sesuai dengan minat
                                mereka.
                            </p>
                            <div class="about-items wow fadeInUp wow" data-wow-delay=".3s">
                                <div class="about-icon-items">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images-user/check.png') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Informasi Terstruktur
                                        </h5>
                                    </div>
                                </div>
                                <div class="text">
                                    <p>
                                        Temukan destinasi terkurasi dalam satu <br> platform yang mudah diakses.
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
                                            Kategori Beragam
                                        </h5>
                                    </div>
                                </div>
                                <div class="text">
                                    <p>
                                        Mulai dari pantai, pegunungan, budaya, <br> hingga destinasi kuliner terbaik.
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('landing.blog') }}" class="theme-btn wow fadeInUp wow"
                                data-wow-delay=".7s">Lihat Destinasi<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                    Siap Menjelajah?
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                                    Platform Rekomendasi Wisata Terstruktur
                                </h2>
                            </div>
                            <p class="wow fadeInUp wow" data-wow-delay=".3s">
                                Berdasarkan permasalahan tersebut, dibangunlah Travesta: sebuah aplikasi web berbasis
                                Laravel
                                yang berfungsi sebagai platform rekomendasi wisata di Indonesia. Aplikasi ini membantu
                                pengguna menemukan berbagai destinasi wisata menarik yang dikelompokkan berdasarkan
                                kategori.
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
                                                Mudah Diakses
                                            </h5>
                                        </div>
                                    </div>
                                    <ul class="circle-icon">
                                        <li>
                                            <i class="fa-solid fa-badge-check"></i>
                                        </li>
                                        <li>
                                            Akses informasi wisata kapan saja <br>
                                            dan di mana saja.
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
                                                Deskripsi Jelas
                                            </h5>
                                        </div>
                                    </div>
                                    <ul class="circle-icon">
                                        <li>
                                            <i class="fa-solid fa-badge-check"></i>
                                        </li>
                                        <li>
                                            Setiap destinasi dilengkapi info <br>
                                            akurat untuk rencana Anda.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('landing.blog') }}" class="theme-btn wow fadeInUp wow"
                                data-wow-delay=".9s">Hubungi Kami<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-image wow fadeInUp wow" data-wow-delay=".3s">
                            <img src="{{ asset('assets/images-user/main-image1.jpg') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">
                    Tim Pengembang
                </span>
                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">Tim Kami</h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="team-card-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/images-user/team/01hikmah.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a>Hikmah Alusmawati</a></h4>
                            <p>10221015</p>
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
                            <img src="{{ asset('assets/images-user/team/02dillah.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a>Nur Fadillah</a></h4>
                            <p>10221019</p>
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
                            <img src="{{ asset('assets/images-user/team/03fajri.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a>M Fajrian Sidiq</a></h4>
                            <p>10221025</p>
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
                            <img src="{{ asset('assets/images-user/team/04adit.jpg') }}" alt="img">
                        </div>
                        <div class="team-content">
                            <h4><a>Mohammad Adita</a></h4>
                            <p>10221087</p>
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

    <section class="testimonial-section section-padding fix bg-cover"
        style="background-image: url('{{ asset('assets/images-user/testimonial/testimonial-bg.jpg') }}');">
        <div class="container">
            <div class="testimonial-wrapper-3">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6 wow fadeInUp wow" data-wow-delay=".3s">
                        <div class="testimonial-image">
                            <img src="{{ asset('assets/images-user/testimonial/testimonial03.jpg') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">
                                    Testimoni
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                                    Apa Kata Pengguna Kami
                                </h2>
                            </div>
                            <div class="swiper testimonial-slider3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial-card-items">
                                            <div class="client-info-items">
                                                <div class="client-info">
                                                    <div class="client-image">
                                                        <img src="{{ asset('assets/images-user/testimonial/client-1.jpg') }}"
                                                            alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h4>
                                                            Pengguna Travesta
                                                        </h4>
                                                        <p>
                                                            Travel Enthusiast
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
                                                "Aplikasi ini sangat membantu saya menemukan
                                                destinasi tersembunyi di Indonesia. Informasinya lengkap dan
                                                terstruktur dengan baik. Sangat direkomendasikan!"
                                            </p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-card-items">
                                            <div class="client-info-items">
                                                <div class="client-info">
                                                    <div class="client-image">
                                                        <img src="{{ asset('assets/images-user/testimonial/client-2.jpg') }}"
                                                            alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h4>
                                                            Pengguna Lain
                                                        </h4>
                                                        <p>
                                                            Backpacker
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
                                                "Suka sekali dengan pengelompokan kategorinya. Saya jadi mudah mencari
                                                referensi wisata kuliner dan budaya di satu tempat."
                                            </p>
                                        </div>
                                    </div>
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

    <div class="instagram-banner fix section-padding">
        <div class="instagram-wrapper">
            <h2 class="text-center wow fadeInUp" data-wow-delay=".3s">Jelajahi Indonesia bersama kami</h2>
        </div>
    </div>

@endsection
