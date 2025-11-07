<!-- Start Sidebar -->
<aside id="app-menu"
    class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-sidenav min-w-sidenav -translate-x-full transform overflow-y-auto bg-default-900 transition-none hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">
    <div class="sticky top-0 flex h-16 items-center justify-center px-6">
        <a href="{{ url('/') }}" class="hidden lg:flex items-center gap-3">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="h-10">
        </a>
        <a href="{{ url('/') }}" class="lg:hidden flex items-center">
            <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="logo" class="h-6">
            <span class="text-white text-lg font-semibold tracking-wide">Travesta</span>
        </a>
    </div>

    <div class="h-[calc(100%-64px)] p-4" data-simplebar>
        <ul class="admin-menu hs-accordion-group flex w-full flex-col gap-1.5">
            <li class="menu-item">
                <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-none {{ request()->routeIs('posts.*') ? 'bg-default-100/5 text-primary is-active' : 'text-default-300 hover:bg-default-100/5' }}"
                    href="{{ route('posts.index') }}">
                    <span class="icon-wrap inline-flex items-center justify-center rounded-md h-9 w-9 bg-transparent">
                        <i
                            class="material-symbols-rounded font-light text-2xl transition-none group-hover:fill-1">article</i>
                    </span>
                    <span class="menu-text">Posts</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('categories.index') }}"
                    class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-none {{ request()->routeIs('categories.*') ? 'bg-default-100/5 text-primary is-active' : 'text-default-300 hover:bg-default-100/5' }}">
                    <span class="icon-wrap inline-flex items-center justify-center rounded-md h-9 w-9 bg-transparent">
                        <i
                            class="material-symbols-rounded font-light text-2xl transition-none group-hover:fill-1">label</i>
                    </span>
                    <span class="menu-text"> Categories </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin.comments.index') }}"
                    class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-none {{ request()->routeIs('admin.comments.*') ? 'bg-default-100/5 text-primary is-active' : 'text-default-300 hover:bg-default-100/5' }}">
                    <span class="icon-wrap inline-flex items-center justify-center rounded-md h-9 w-9 bg-transparent">
                        <i class="material-symbols-rounded font-light text-2xl transition-none group-hover:fill-1">chat</i>
                    </span>
                    <span class="menu-text"> Comments </span>
                </a>
            </li>

            <!-- more items from template can be left as static placeholders -->
        </ul>
    </div>
</aside>
<!-- End Sidebar -->