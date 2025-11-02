<!-- Navbar partial generated from user's Bootstrap template -->
<div id="preloader" class="preloader">
    <div class="animation-preloader">
        <div class="spinner"></div>
        <div class="txt-loading">
            <span data-text-preloader="T" class="letters-loading">T</span>
            <span data-text-preloader="U" class="letters-loading">U</span>
            <span data-text-preloader="R" class="letters-loading">R</span>
            <span data-text-preloader="M" class="letters-loading">M</span>
            <span data-text-preloader="E" class="letters-loading">E</span>
            <span data-text-preloader="T" class="letters-loading">T</span>
        </div>
        <p class="text-center">Loading</p>
    </div>
    <div class="loader">
        <div class="row">
            <div class="col-3 loader-section section-left"><div class="bg"></div></div>
            <div class="col-3 loader-section section-left"><div class="bg"></div></div>
            <div class="col-3 loader-section section-right"><div class="bg"></div></div>
            <div class="col-3 loader-section section-right"><div class="bg"></div></div>
        </div>
    </div>
</div>

<!-- Back To Top -->
<button id="back-top" class="back-to-top">
    <i class="fa-regular fa-arrow-up"></i>
</button>

<!-- Mouse Cursor (template) -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<!-- Offcanvas (mobile menu / info) -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images-user/logo/black-logo.svg') }}" alt="logo-img">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <p class="text d-none d-xl-block">{{ config('app.name') }} — travel & tour</p>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>Contact Info</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon"><i class="fal fa-map-marker-alt"></i></div>
                            <div class="offcanvas__contact-text"><a target="_blank" href="#">Main Street, Melbourne, Australia</a></div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15"><i class="fal fa-envelope"></i></div>
                            <div class="offcanvas__contact-text"><a href="mailto:info@example.com">info@example.com</a></div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15"><i class="fal fa-clock"></i></div>
                            <div class="offcanvas__contact-text"><a target="_blank" href="#">Mon-Fri, 09am - 05pm</a></div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15"><i class="far fa-phone"></i></div>
                            <div class="offcanvas__contact-text"><a href="tel:+11002345909">+1 100 234 5909</a></div>
                        </li>
                    </ul>
                    <div class="header-button mt-4">
                        <a href="#" class="theme-btn">Request A Quote <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
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

<!-- Header / Navbar -->
<header id="header-sticky" class="header-1 header-3">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo">
                    <a href="{{ url('/') }}" class="header-logo">
                        <img src="{{ asset('assets/images-user/logo/black-logo.svg') }}" alt="logo-img">
                    </a>
                    <a href="{{ url('/') }}" class="header-logo-2">
                        <img src="{{ asset('assets/images-user/logo/white-logo.svg') }}" alt="logo-img">
                    </a>
                </div>
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="has-dropdown active menu-thumb"><a href="{{ url('/') }}">Home <i class="fa-solid fa-chevron-down"></i></a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Destinations <i class="fa-solid fa-chevron-down"></i></a></li>
                                <li><a href="#">Tour <i class="fa-solid fa-chevron-down"></i></a></li>
                                <li><a href="#">Pages <i class="fa-solid fa-chevron-down"></i></a></li>
                                <li><a href="{{ route('landing.blog') }}">Blog</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <a href="#0" class="search-trigger search-icon"><i class="fa-regular fa-magnifying-glass"></i></a>
                    <a href="#" class="theme-btn">Request A Quote <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle"><i class="fas fa-bars"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Search area placeholder (template) -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fas fa-times search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get">
                <div class="search-field-holder"><input type="search" class="main-search-input" placeholder="Search..."></div>
            </form>
        </div>
    </div>
</div>
