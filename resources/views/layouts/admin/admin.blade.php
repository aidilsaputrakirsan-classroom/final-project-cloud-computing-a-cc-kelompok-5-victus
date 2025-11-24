<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin') - Travesta</title>

  <!-- Early dark-mode initializer: set `data-theme="dark"` before styles load to avoid white flash -->
  <script>
    (function(){
      try {
        var key = 'dark-mode-enabled';
        var saved = localStorage.getItem(key);
        var prefers = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        var dark = (saved === null) ? prefers : (saved === 'true');
        if (dark) document.documentElement.setAttribute('data-theme','dark');
      } catch(e) {}
    })();
  </script>

  <style>
    /* Immediate inline fallback so initial paint uses dark background when data-theme is set */
    html[data-theme="dark"] body { background-color: #0b1221; color: #ffffff; }
  </style>

  <!-- Favicon for admin pages -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">

  <!-- Icons css  (Mandatory in All Pages) -->
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

  <!-- App css  (Mandatory in All Pages) -->
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/admin-custom.css') }}" rel="stylesheet" type="text/css">

  <!-- Dark mode overrides (keeps layout/spacing unchanged) -->
  <link href="{{ asset('assets/css/darkmode.css') }}" rel="stylesheet" type="text/css">

  @stack('head')
</head>

<body class="bg-gray-50 text-default-700">

  @include('layouts.admin.sidenav')
  <!-- Admin-specific layout styles moved to public/assets/css/admin-custom.css -->

  <div id="main-wrapper" class="min-h-screen">
    @include('layouts.admin.topbar')

    <main class="p-6">
      <div class="container mx-auto">
        <div class="bg-white rounded-md shadow-sm overflow-hidden">
          <div class="p-6">
            @if(session('success'))
              <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">{{ session('success') }}</div>
            @endif

            @yield('content')
          </div>
        </div>
      </div>
    </main>

    {{-- scripts (preline, jquery, app.js) are included via partial --}}
    @include('layouts.admin.scripts')

    <!-- Dark mode script (handles toggle + persistence) -->
    <script src="{{ asset('assets/js/darkmode.js') }}"></script>

    @stack('scripts')
</body>

<footer class="footer h-16 flex items-center px-6 border-t border-gray-200">
  <div class="flex md:justify-between justify-center w-full gap-4">
    <div>
      <script>document.write(new Date().getFullYear())</script> © Travesta
    </div>
    <div class="md:flex hidden gap-2 item-center md:justify-end">
      Design &amp; Develop by<a href="#" class="text-primary">Group Victus</a>
    </div>
  </div>
</footer>

</html>