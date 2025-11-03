@extends('layouts.user.app')

@section('title', 'Turmet - Travel & Tour Agency')

@section('content')

    <!-- Hero-3-Section Start -->
    <section class="hero-section hero-3">
        <div class="swiper hero-slider-3">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-image bg-cover"
                        style="background-image: url('{{ asset('assets/images-user/hero/03.jpg') }}');"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <div class="sub-title" data-animation="fadeInUp" data-delay="1.2s">
                                        Temukan Destinasi Impianmu
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay="1.4s">
                                        Jelajahi Keindahan Nusantara <br>
                                        Bersama Travesta
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay="1.6s">
                                        Travesta membantu kamu menemukan berbagai destinasi wisata menarik di seluruh
                                        Indonesia —
                                        dari pantai tropis, pegunungan, hingga wisata budaya yang memukau. Semua dalam satu
                                        platform.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-image bg-cover"
                        style="background-image: url('{{ asset('assets/images-user/hero/04.jpg') }}');"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <div class="sub-title" data-animation="fadeInUp" data-delay="1.2s">
                                        Temukan Destinasi Impianmu
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay="1.4s">
                                        Jelajahi Keindahan Nusantara <br>
                                        Bersama Travesta
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay="1.6s">
                                        Travesta membantu kamu menemukan berbagai destinasi wisata menarik di seluruh
                                        Indonesia —
                                        dari pantai tropis, pegunungan, hingga wisata budaya yang memukau. Semua dalam satu
                                        platform.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-image bg-cover"
                        style="background-image: url('{{ asset('assets/images-user/hero/05.jpg') }}');"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <div class="sub-title" data-animation="fadeInUp" data-delay="1.2s">
                                        Temukan Destinasi Impianmu
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay="1.4s">
                                        Jelajahi Keindahan Nusantara <br>
                                        Bersama Travesta
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay="1.6s">
                                        Travesta membantu kamu menemukan berbagai destinasi wisata menarik di seluruh
                                        Indonesia —
                                        dari pantai tropis, pegunungan, hingga wisata budaya yang memukau. Semua dalam satu
                                        platform.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-dot">
                <div class="dot2"></div>
            </div>
        </div>
    </section>


    <!-- Top-destination-section Start -->
    <section class="top-destination-section section-padding fix">
        <div class="bag-shape float-bob-x">
            <img src="{{ asset('assets/images-user/destination/bag-shape.png') }}" alt="img">
        </div>
        <div class="watch-shape float-bob-y">
            <img src="{{ asset('assets/images-user/destination/watch.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">Destinasi Populer</span>
                <h2 class="wow fadeInUp wow" data-wow-delay=".3s">
                    Jelajahi Pesona Terbaik Indonesia
                </h2>
            </div>
            <div class="new-top-destination-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="new-top-desti-thumb">
                                    <img src="{{ asset('assets/images-user/destination/new/top1.jpg') }}" alt="img">
                                    <a href="{{ asset('assets/images-user/destination/new/top1.jpg') }}"
                                        class="icon img-popup2">
                                        <i class="fa-regular fa-plus"></i>
                                    </a>
                                    <div class="content">
                                        <h4><a href="#">Labuan Bajo</a></h4>
                                        <p>174,688 Pengunjung</p>
                                    </div>
                                </div>
                                <div class="new-top-desti-thumb">
                                    <img src="{{ asset('assets/images-user/destination/new/top2.jpg') }}" alt="img">
                                    <a href="{{ asset('assets/images-user/destination/new/top2.jpg') }}"
                                        class="icon img-popup2">
                                        <i class="fa-regular fa-plus"></i>
                                    </a>
                                    <div class="content">
                                        <h4><a href="#">Danau Toba</a></h4>
                                        <p>174,688 Pengunjung</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="new-top-desti-thumb">
                                    <img src="{{ asset('assets/images-user/destination/new/top3.jpg') }}" alt="img">
                                    <a href="{{ asset('assets/images-user/destination/new/top3.jpg') }}"
                                        class="icon img-popup2">
                                        <i class="fa-regular fa-plus"></i>
                                    </a>
                                    <div class="content">
                                        <h4><a href="#">Candi Borobudur</a></h4>
                                        <p>174,688 Pengunjung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="new-top-desti-thumb">
                                    <img src="{{ asset('assets/images-user/destination/new/top4.jpg') }}" alt="img">
                                    <a href="{{ asset('assets/images-user/destination/new/top4.jpg') }}"
                                        class="icon img-popup2">
                                        <i class="fa-regular fa-plus"></i>
                                    </a>
                                    <div class="content">
                                        <h4><a href="#">Kawah Putih</a></h4>
                                        <p>174,688 Pengunjung</p>
                                    </div>
                                </div>
                                <div class="new-top-desti-thumb">
                                    <img src="{{ asset('assets/images-user/destination/new/top5.jpg') }}" alt="img">
                                    <a href="{{ asset('assets/images-user/destination/new/top5.jpg') }}"
                                        class="icon img-popup2">
                                        <i class="fa-regular fa-plus"></i>
                                    </a>
                                    <div class="content">
                                        <h4><a href="#">Tanah Lot Bali</a></h4>
                                        <p>174,688 Pengunjung</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="new-top-desti-thumb">
                                    <img src="{{ asset('assets/images-user/destination/new/top6.jpg') }}" alt="img">
                                    <a href="{{ asset('assets/images-user/destination/new/top6.jpg') }}"
                                        class="icon img-popup2">
                                        <i class="fa-regular fa-plus"></i>
                                    </a>
                                    <div class="content">
                                        <h4><a href="#">Tana Toraja</a></h4>
                                        <p>174,688 Pengunjung</p>
                                    </div>
                                </div>
                                <div class="new-top-desti-thumb">
                                    <img src="{{ asset('assets/images-user/destination/new/top7.jpg') }}" alt="img">
                                    <a href="{{ asset('assets/images-user/destination/new/top7.jpg') }}"
                                        class="icon img-popup2">
                                        <i class="fa-regular fa-plus"></i>
                                    </a>
                                    <div class="content">
                                        <h4><a href="#">Pulau Derawan</a></h4>
                                        <p>174,688 Pengunjung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- (Additional sections like About, Deals, Featured, Testimonial, etc. can be added below following the same pattern) -->

@endsection