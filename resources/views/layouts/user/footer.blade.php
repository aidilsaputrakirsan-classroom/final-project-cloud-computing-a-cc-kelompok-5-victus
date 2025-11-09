<footer class="footer-section fix"
    style="background-color: #1CA8CB; background-image: url('{{ asset('assets/images-user/footer/footer-bg.jpg') }}'); background-size: cover; background-position: center;">

    <div class="container">
        <div class="footer-widget-wrapper-new">
            <div class="row">

                <div class="col-xl-4 col-lg-5 col-md-8 col-sm-6">
                    <div class="single-widget-items text-center">
                        <div class="widget-head">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images-user/logo/logotravesta.png') }}" alt="Travesta Logo"
                                    class="img-fluid" style="max-width: 200px;">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p style="color: white; opacity: 0.9; margin-top: 15px;">
                                Platform rekomendasi wisata di Indonesia, membantu Anda menemukan destinasi menarik
                                dari pantai, pegunungan, hingga budaya.
                            </p>

                            <div class="social-icon d-flex align-items-center justify-content-center"
                                style="margin-top: 20px;">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 ps-lg-5">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Quick Links</h4>
                        </div>
                        <ul class="list-items">
                            <li><a href="{{ route('landing') }}">Home</a></li>
                            <li><a href="{{ route('landing.about') }}">About</a></li>
                            <li><a href="{{ route('landing.blog') }}">Destination</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ps-lg-5">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Popular Categories</h4>
                        </div>
                        @php
                            $popularCategories = \App\Models\Category::withCount([
                                'posts' => function ($q) {
                                    $q->whereNotNull('published_at');
                                }
                            ])->orderByDesc('posts_count')->take(5)->get();
                        @endphp
                        <ul class="list-items">
                            @forelse($popularCategories as $cat)
                                <li><a href="{{ route('landing.blog', ['category' => $cat->slug]) }}">{{ $cat->name }} <span
                                            style="opacity:0.8">({{ $cat->posts_count }})</span></a></li>
                            @empty
                                <li>No categories</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ps-xl-5">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Contact Us</h4>
                        </div>
                        <div class="contact-info">
                            <div class="contact-items">
                                <div class="icon"><i class="fa-regular fa-location-dot"></i></div>
                                <div class="content">
                                    <h6>Balikpapan</h6>
                                </div>
                            </div>
                            <div class="contact-items">
                                <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                                <div class="content">
                                    <h6><a href="mailto:travesta@gmail.com">travesta@gmail.com</a></h6>
                                </div>
                            </div>
                            <div class="contact-items">
                                <div class="icon"><i class="fa-solid fa-phone"></i></div>
                                <div class="content">
                                    <h6><a href="tel:+6281234567890">+62 812 3456 7890</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-wrapper">
                <p>Copyright © <span>{{ date('Y') }} Travesta,</span> All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>