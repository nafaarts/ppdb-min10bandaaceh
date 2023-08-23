<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Beranda') - {{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    style="
    background-image: url({{ asset('background.jpeg') }});
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
">
    <div
        class="font-sans bg-gradient-to-r from-green-500/50 to-green-800/75 antialiased flex flex-col flex-between min-h-screen">
        <header class="text-white body-font">
            <div class="container mx-auto flex flex-wrap p-5 justify-between items-center">
                <a href="{{ url('/') }}" class="flex title-font font-medium items-center">
                    <x-application-logo class="block h-9 w-auto fill-current" />
                    <span class="hidden md:block ml-3 text-xl">MIN 10 Banda Aceh</span>
                </a>

                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="bg-transparent border text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95" @click.away="open = false"
                        class="absolute end-0 mt-2 py-2 bg-white border border-gray-300 rounded shadow-md">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="block px-6 py-2 text-gray-800 hover:bg-gray-100 whitespace-nowrap">
                                Dashboard
                            </a>
                        @endauth
                        @php
                            $statusPengumuman = App\Models\KonfigurasiUmum::where('nama', 'pengumuman_lulus')->first()?->value;
                            $statusPendaftaran = App\Models\KonfigurasiUmum::where('nama', 'status_pendaftaran')->first()?->value;
                        @endphp
                        <a @if ($statusPendaftaran) href="{{ route('formulir') }}" @else href="javascript:alert('Maaf pendaftaran sudah ditutup!')" @endif
                            class="block px-6 py-2 text-gray-800 hover:bg-gray-100 whitespace-nowrap">Formulir</a>

                        <a href="{{ route('bukti-pendaftaran') }}"
                            class="block px-6 py-2 text-gray-800 hover:bg-gray-100 whitespace-nowrap">
                            Cetak Bukti Pendaftaran
                        </a>

                        @if ($statusPengumuman)
                            <a href="{{ route('data-lulus') }}"
                                class="block px-6 py-2 text-gray-800 hover:bg-gray-100 whitespace-nowrap">
                                Pengumuman Kelulusan
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </header>

        @yield('content')

        <footer class="text-gray-600 body-font">
            <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
                <p class="text-sm text-white sm:ml-4 sm:pl-4 sm:py-2 sm:mt-0 mt-4">©
                    {{ date('Y') }} MIN 10 Banda Aceh
                </p>
                <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                    <a class="text-white">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-white">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                            </path>
                        </svg>
                    </a>
                    <a class="ml-3 text-white">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5"
                                ry="5">
                            </rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-white">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                            <path stroke="none"
                                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                            </path>
                            <circle cx="4" cy="4" r="2" stroke="none"></circle>
                        </svg>
                    </a>
                </span>
            </div>
        </footer>
    </div>
</body>

</html>
