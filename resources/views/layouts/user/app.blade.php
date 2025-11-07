<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <!-- Template CSS (mapped to public/css-user) -->
  <link rel="shortcut icon" href="{{ asset('assets/images-user/favicon.svg') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/meanmenu.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/swiper-bundle.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/datepickerboot.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/color.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css-user/main.css') }}">
    @stack('styles')
  </head>
  <body>

    @include('layouts.user.navbar')

    <main>
      @yield('content')
    </main>

    @include('layouts.user.footer')

    <!-- Template JS (mapped to public/js-user) -->
  <script src="{{ asset('assets/js-user/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/viewport.jquery.js') }}"></script>
  <script src="{{ asset('assets/js-user/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/jquery.waypoints.js') }}"></script>
  <script src="{{ asset('assets/js-user/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/jquery.meanmenu.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('assets/js-user/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/wow.min.js') }}"></script>
  <script src="{{ asset('assets/js-user/main.js') }}"></script>
    @stack('scripts')
  </body>
</html>
