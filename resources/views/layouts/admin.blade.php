<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin') - Travesta</title>
  @include('admin.partials.head-css')
  @stack('head')
</head>

<body class="bg-gray-50 text-default-700">

  @include('admin.partials.sidenav')
  <!-- Admin-specific layout styles moved to public/assets/css/admin-custom.css -->

  <div id="main-wrapper" class="min-h-screen">
    @include('admin.partials.topbar')

    <main class="p-6">
      <div class="container mx-auto">
        <div class="bg-white rounded-md shadow-sm overflow-hidden">
          @if(!empty($pageTitle ?? null))
            <!-- Page Title (inlined from admin.partials.page-title to reduce partials) -->
            <div class="flex items-center md:justify-between flex-wrap gap-2 mb-6">
                <div>
                    <h4 class="text-default-900 text-lg font-medium mb-2">{{ $pageTitle ?? '' }}</h4>
                    @if(!empty($pageSubtitle ?? null))
                        <div class="md:flex hidden items-center gap-3 text-sm font-semibold">
                            <a href="#" class="text-sm font-medium text-default-700">Windzon</a>
                            <i class="material-symbols-rounded text-xl flex-shrink-0 text-default-500">chevron_right</i>
                            <a href="#" class="text-sm font-medium text-default-700">{{ $pageSubtitle }}</a>
                            <i class="material-symbols-rounded text-xl flex-shrink-0 text-default-500">chevron_right</i>
                            <a href="#" class="text-sm font-medium text-default-700" aria-current="page">{{ $pageTitle ?? '' }}</a>
                        </div>
                    @endif
                </div>
            </div>
          @endif

          <div class="p-6">
            @if(session('success'))
              <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">{{ session('success') }}</div>
            @endif

            @yield('content')
          </div>
        </div>
      </div>
    </main>

  <div class="px-6">
    <!-- Footer (inlined from admin.partials.footer to reduce partials) -->
    <footer class="footer h-16 flex items-center px-6 border-t border-gray-200">
      <div class="flex md:justify-between justify-center w-full gap-4">
        <div>
          <script>document.write(new Date().getFullYear())</script> © Windzon
        </div>
        <div class="md:flex hidden gap-2 item-center md:justify-end">
          Design &amp; Develop by<a href="#" class="text-primary">MyraStudio</a>
        </div>
      </div>
    </footer>
  </div>
  </div>

  @include('admin.partials.footer-scripts')
  @stack('scripts')
</body>

</html>