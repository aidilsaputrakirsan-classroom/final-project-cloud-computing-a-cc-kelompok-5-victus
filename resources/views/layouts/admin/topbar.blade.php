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

        <!-- quick area (language menu removed) -->

        <div class="ms-auto flex items-center gap-4">
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

            <!-- Dark Mode Toggle Button -->
            <div class="md:flex hidden">
                <button id="dark-mode-toggle" type="button" class="nav-link p-2" title="Toggle Dark Mode" aria-pressed="false">
                    <span class="sr-only">Toggle dark mode</span>
                      <span class="flex items-center justify-center size-6">
                        <!-- Moon icon (visible when light mode) - Iconify -->
                        <iconify-icon icon="tabler:moon" class="dm-moon text-2xl" aria-hidden="true"></iconify-icon>

                        <!-- Sun icon (visible when dark mode is active) - Iconify -->
                        <iconify-icon icon="tabler:sun" class="dm-sun text-2xl hidden" aria-hidden="true"></iconify-icon>
                    </span>
                </button>
            </div>

            <!-- Profile Dropdown Button -->
            <div class="relative">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button type="button" class="hs-dropdown-toggle nav-link flex items-center gap-2">
                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="user-image"
                            class="rounded-full h-10">
                        <i class="i-tabler-chevron-down text-sm ms-2"></i>
                    </button>
                    <div
                        class="hs-dropdown-menu mt-2 min-w-48 rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-none hs-dropdown-open:opacity-100 hidden">
                        <a class="flex items-center py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100"
                            href="{{ route('profile.edit') }}">Profile</a>
                        <hr class="my-2">
                        @auth
                            <form method="POST" action="{{ route('logout') }}" data-logout-form>
                                @csrf
                                <button type="submit"
                                    class="w-full text-start flex items-center py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100">
                                    Log Out
                                </button>
                            </form>
                        @else
                            <a class="flex items-center py-2 px-3 rounded-md text-sm text-default-800 hover:bg-gray-100"
                                href="{{ route('login') }}">Log Out</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- Topbar End -->