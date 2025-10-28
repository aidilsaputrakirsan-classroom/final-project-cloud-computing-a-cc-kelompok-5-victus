<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - Travesta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 text-gray-900">

    <div class="min-h-screen flex flex-col justify-center items-center px-6">
        <!-- Logo / Title -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-gradient mb-4">
                🌍 Travesta
            </h1>
            <p class="text-lg text-gray-600 max-w-xl mx-auto">
                Selamat datang di <span class="font-semibold text-primary-600">Travesta</span> —
                platform informasi dan rekomendasi destinasi wisata di seluruh Indonesia.
                Pilih menu di bawah untuk menjelajahi destinasi publik atau mengelola data di dashboard admin.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl w-full">

            <!-- Landing / User Page -->
            <a href="#"
                class="group bg-white border border-gray-200 rounded-2xl p-8 shadow-sm hover:shadow-lg transition flex flex-col items-start">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary-100 mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7l9-4 9 4-9 4-9-4zm0 6l9 4 9-4m-9 4v5" />
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-2 group-hover:text-primary-600 transition">
                    Jelajahi Destinasi
                </h2>
                <p class="text-gray-600 mb-4 flex-1">
                    Temukan beragam destinasi wisata menarik — dari pantai, gunung, kota, budaya, hingga kuliner khas
                    Indonesia.
                </p>
                <span class="mt-auto text-gray-800 font-medium">Masuk →</span>
            </a>

            <!-- Admin / Dashboard Page -->
            <a href="#"
                class="group bg-white border border-gray-200 rounded-2xl p-8 shadow-sm hover:shadow-lg transition flex flex-col items-start">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-gray-800 mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-2 group-hover:text-primary-600 transition">
                    Dashboard Admin
                </h2>
                <p class="text-gray-600 mb-4 flex-1">
                    Kelola data destinasi wisata, kategori, dan galeri foto melalui dashboard admin Travesta.
                </p>
                <span class="mt-auto text-gray-800 font-medium">Masuk →</span>
            </a>

        </div>

        <!-- Footer -->
        <footer class="mt-16 text-sm text-gray-500">
            © {{ date('Y') }} Travesta — Eksplorasi Destinasi Indonesia
        </footer>
    </div>
</body>

</html>