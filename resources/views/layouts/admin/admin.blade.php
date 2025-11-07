<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin') - Travesta</title>

  <!-- Icons css  (Mandatory in All Pages) -->
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

  <!-- App css  (Mandatory in All Pages) -->
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/admin-custom.css') }}" rel="stylesheet" type="text/css">

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