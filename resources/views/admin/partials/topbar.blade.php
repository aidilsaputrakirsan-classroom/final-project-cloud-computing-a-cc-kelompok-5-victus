<!-- Topbar Start -->
<header class="app-header">
    <div class="h-16 flex items-center px-5 gap-4 bg-white lg:rounded-t-xl border-b border-default-100">
        <a href="{{ url('/') }}" class="hidden lg:flex items-center mr-4">
            <img src="{{ asset('assets/images/logo-light.png') }}" class="h-8" alt="Logo">
        </a>
        <!-- Topbar Brand Logo -->
        <a href="{{ url('/') }}" class="md:hidden flex">
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="h-6" alt="Small logo">
        </a>

        <!-- Sidenav Menu Toggle Button removed per layout preference -->

        <!-- quick area -->
        <div class="ms-auto hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle inline-flex items-center">
                <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="user-image" class="h-4 w-6">
            </button>

            <div class="hs-dropdown-menu mt-2 min-w-48 rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-none hs-dropdown-open:opacity-100 hidden">
                <a href="#" class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100">
                    <img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="user-image" class="h-4">
                    <span class="align-middle">German</span>
                </a>
                <a href="#" class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100">
                    <img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="user-image" class="h-4">
                    <span class="align-middle">Italian</span>
                </a>
            </div>
        </div>

        <!-- Fullscreen Toggle Button -->
        <div class="md:flex hidden">
            <button data-toggle="fullscreen" type="button" class="nav-link p-2">
                <span class="sr-only">Fullscreen Mode</span>
                <span class="flex items-center justify-center size-6">
                    <i class="i-tabler-maximize text-2xl flex group-[-fullscreen]:hidden"></i>
                    <i class="i-tabler-minimize text-2xl hidden group-[-fullscreen]:flex"></i>
                </span>
            </button>
        </div>

        <!-- Profile Dropdown Button -->
        <div class="relative">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="hs-dropdown-toggle nav-link flex items-center gap-2">
                    <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="user-image" class="rounded-full h-10">
                    <i class="i-tabler-chevron-down text-sm ms-2"></i>
                </button>
                <div class="hs-dropdown-menu mt-2 min-w-48 rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-none hs-dropdown-open:opacity-100 hidden">
                    <a class="flex items-center py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100" href="#">Profile</a>
                    <a class="flex items-center py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100" href="#">Settings</a>
                    <hr class="my-2">
                    <a class="flex items-center py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100" href="#">Log Out</a>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- Topbar End -->
