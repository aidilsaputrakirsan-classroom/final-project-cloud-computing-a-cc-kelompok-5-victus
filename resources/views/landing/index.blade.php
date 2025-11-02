@extends('layouts.user.app')

@section('title', 'Turmet - Travel & Tour Agency')

@section('content')

<!-- Hero-3-Section Start -->
<section class="hero-section hero-3">
    <div class="swiper hero-slider-3">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/images-user/hero/03.png') }}');"></div>
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <div class="sub-title" data-animation="fadeInUp" data-delay="1.2s">
                                        Booking Now
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay="1.4s">
                                        Lifelong Memories Just <br>
                                        A Few Days Away
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay="1.6s">
                                        Making your dream to see the world come true is a thrilling and enriching goal. Traveling allows you to experience new cultures, cuisines, landscapes, and ways of life.
                                    </p>
                                    <div class="about-button" data-animation="fadeInUp" data-delay="1.8s">
                                        <a href="#" class="theme-btn">Explore Flight<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                        <a href="#" class="theme-btn style-2">Book A Stay<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
             </div>
             <div class="swiper-slide">
                <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/images-user/hero/04.png') }}');"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero-content">
                                <div class="sub-title" data-animation="fadeInUp" data-delay="1.2s">
                                    Booking Now
                                </div>
                                <h1 data-animation="fadeInUp" data-delay="1.4s">
                                    Lifelong Memories Just <br>
                                    A Few Days Away
                                </h1>
                                <p data-animation="fadeInUp" data-delay="1.6s">
                                    Making your dream to see the world come true is a thrilling and enriching goal. Traveling allows you to experience new cultures, cuisines, landscapes, and ways of life.
                                </p>
                                <div class="about-button" data-animation="fadeInUp" data-delay="1.8s">
                                    <a href="#" class="theme-btn">Explore Flight<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="theme-btn style-2">Book A Stay<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="swiper-slide">
                <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/images-user/hero/03.png') }}');"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero-content">
                                <div class="sub-title" data-animation="fadeInUp" data-delay="1.2s">
                                    Booking Now
                                </div>
                                <h1 data-animation="fadeInUp" data-delay="1.4s">
                                    Lifelong Memories Just <br>
                                    A Few Days Away
                                </h1>
                                <p data-animation="fadeInUp" data-delay="1.6s">
                                    Making your dream to see the world come true is a thrilling and enriching goal. Traveling allows you to experience new cultures, cuisines, landscapes, and ways of life.
                                </p>
                                <div class="about-button" data-animation="fadeInUp" data-delay="1.8s">
                                    <a href="#" class="theme-btn">Explore Flight<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                    <a href="#" class="theme-btn style-2">Book A Stay<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                </div>
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

<!-- from-booking-section Start -->
<section class="from-booking-section">
    <div class="container">
        <div class="booking-wrapper2">
            <div class="row">
                <div class="booking-wrap">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="#thumb1" data-bs-toggle="tab" class="nav-link active">
                                <i class="fa-solid fa-arrow-right"></i>
                                One Way
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#thumb2" data-bs-toggle="tab" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Round Trip 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#thumb3" data-bs-toggle="tab" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Multi City
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#thumb4" data-bs-toggle="tab" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Random Trip
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="thumb1" class="tab-pane fade show active">
                       <div class="tour-wrapper">
                            <div class="tour-item style-5">
                                    <div class="icon">
                                    <img src="{{ asset('assets/images-user/icon/40.svg') }}" alt="icon">
                                </div>
                                <div class="content">
                                    <h5>Departure City</h5>
                                    <div class="form">
                                        <select class="single-select w-100">
                                            <option>New York - United States</option>
                                            <option>New York - United States</option>
                                            <option>New York - United States</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tour-item">
                                    <div class="icon">
                                    <img src="{{ asset('assets/images-user/icon/41.svg') }}" alt="icon">
                                </div>
                                <div class="content">
                                    <h5>Arrival city</h5>
                                    <div class="form">
                                        <select class="single-select w-100">
                                            <option>Dallas, Texas, USA</option>
                                            <option>Dallas, Texas, USA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tour-item">
                                    <div class="icon">
                                    <img src="{{ asset('assets/images-user/icon/42.svg') }}" alt="icon">
                                </div>
                                <div class="content">
                                    <h5>Check In / Check Out</h5>
                                    <div class="form-clt">
                                        <div class="form-clt">
                                            <input type="date" id="date1" name="date1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tour-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/images-user/icon/43.svg') }}" alt="icon">
                                </div>
                                <div class="content">
                                    <h5>Passenger</h5>
                                    <div class="form">
                                        <select class="single-select w-100">
                                            <option>01 Adults</option>
                                            <option>02 Adults</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="theme-btn">
                                    Search
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                       </div>
                    </div>
                    <!-- other tabs omitted for brevity, you can copy same structure if needed -->
                </div>
            </div>
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
            <span class="sub-title wow fadeInUp">Top Destination</span>
            <h2 class="wow fadeInUp wow" data-wow-delay=".3s">
                Most Popular Destinations
            </h2>
        </div>
        <div class="new-top-destination-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="new-top-desti-thumb">
                                <img src="{{ asset('assets/images-user/destination/new/05.jpg') }}" alt="img">
                                <a href="{{ asset('assets/images-user/destination/new/05.jpg') }}" class="icon img-popup2">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h4><a href="#">United Kingdom</a></h4>
                                    <p>174,688 Travelers</p>
                                </div>
                            </div>
                            <div class="new-top-desti-thumb">
                                <img src="{{ asset('assets/images-user/destination/new/06.jpg') }}" alt="img">
                                <a href="{{ asset('assets/images-user/destination/new/06.jpg') }}" class="icon img-popup2">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h4><a href="#">United Kingdom</a></h4>
                                    <p>174,688 Travelers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="new-top-desti-thumb">
                                <img src="{{ asset('assets/images-user/destination/new/07.jpg') }}" alt="img">
                                <a href="{{ asset('assets/images-user/destination/new/07.jpg') }}" class="icon img-popup2">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h4><a href="#">United Kingdom</a></h4>
                                    <p>174,688 Travelers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="new-top-desti-thumb">
                                <img src="{{ asset('assets/images-user/destination/new/08.jpg') }}" alt="img">
                                <a href="{{ asset('assets/images-user/destination/new/08.jpg') }}" class="icon img-popup2">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h4><a href="#">United Kingdom</a></h4>
                                    <p>174,688 Travelers</p>
                                </div>
                            </div>
                            <div class="new-top-desti-thumb">
                                <img src="{{ asset('assets/images-user/destination/new/09.jpg') }}" alt="img">
                                <a href="{{ asset('assets/images-user/destination/new/09.jpg') }}" class="icon img-popup2">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h4><a href="#">United Kingdom</a></h4>
                                    <p>174,688 Travelers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="new-top-desti-thumb">
                                <img src="{{ asset('assets/images-user/destination/new/10.jpg') }}" alt="img">
                                <a href="{{ asset('assets/images-user/destination/new/10.jpg') }}" class="icon img-popup2">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h4><a href="#">United Kingdom</a></h4>
                                    <p>174,688 Travelers</p>
                                </div>
                            </div>
                            <div class="new-top-desti-thumb">
                                <img src="{{ asset('assets/images-user/destination/new/11.jpg') }}" alt="img">
                                <a href="{{ asset('assets/images-user/destination/new/11.jpg') }}" class="icon img-popup2">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <div class="content">
                                    <h4><a href="#">United Kingdom</a></h4>
                                    <p>174,688 Travelers</p>
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
