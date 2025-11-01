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

    <style>
      /* Collapsed / icon-only sidebar look (matches template) */
      #app-menu.collapsed{
        width:72px !important;
        min-width:72px !important;
      }

      /* hide text labels and compress paddings to show icons only */
      #app-menu.collapsed .menu-text{ display:none !important }
      #app-menu.collapsed .admin-menu li .group{ justify-content:center !important }
      #app-menu.collapsed .admin-menu li .group i{ margin-right:0 !important }
      #app-menu.collapsed .admin-menu li .group{ gap:0 !important }

  /* icon wrapper style - no animation for instant changes */
  #app-menu .icon-wrap{ transition: none !important }
  #app-menu .icon-wrap i{ color:inherit }

      /* active item: small rounded bg and primary tint */
      #app-menu a.is-active .icon-wrap{ background: rgba(14,165,233,0.12); color: #0ea5e9 }
      #app-menu.collapsed a.is-active .icon-wrap{ background: #0ea5e9; color:#fff }

      /* reduce top area spacing */
      #app-menu.collapsed .sticky{ padding-left:0; padding-right:0 }

  /* keep content fixed (no animation) */
  #main-wrapper{ transition: none !important }
    </style>

    <div id="main-wrapper" class="min-h-screen">
      @include('admin.partials.topbar')

      <main class="p-6">
        <div class="container mx-auto">
          <div class="bg-white rounded-md shadow-sm overflow-hidden">
            @if(!empty($pageTitle ?? null))
                @include('admin.partials.page-title', ['title' => $pageTitle ?? '', 'subtitle' => $pageSubtitle ?? null])
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
        @include('admin.partials.footer')
      </div>
    </div>

    @include('admin.partials.footer-scripts')
    @stack('scripts')
  </body>
</html>
