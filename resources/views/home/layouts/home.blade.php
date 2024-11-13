<!DOCTYPE html>
<html lang="en" x-data="data()">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobHuntify</title>
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Load jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Load Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <!-- You need focus-trap.js to make the modal accessible -->
    <script src="{{ asset('js/focus-trap.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        #navbar {
            background-color: transparent;
        }

        #navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
{{-- md:mx-16 --}}
<body class="bg-putihG  ">
    <nav id="navbar"
        class="navbar container px-4 lg:px-20 3xl:px-0 py-7  w-full flex  justify-between items-center bg-white transition-all duration-300 fixed right-0 left-0  top-0 z-50 ">
        <div>
            <a class="text-3xl font-bold leading-none" href="{{ route('home') }}">
                <img src="{{ asset('img/LogoJobSync.png') }}" class="w-50" alt="">
            </a>
        </div>
        <div class="lg:hidden">
            <button id="open-sidebar" class="navbar-burger flex items-end text-primary pl-3 py-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <ul class="hidden lg:flex lg:items-center lg:space-x-4 -ml-24">
            <li><a class="text-md md:px-2 lg:px-6 py-3  hover:text-white hover:bg-primary font-semibold transition duration-300 ease-in-out"
                    href="{{ route('home') }}">Home</a></li>

            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                    class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </li>

            <li><a class="text-md md:px-2 lg:px-6 py-3 hover:text-white hover:bg-primary font-semibold transition duration-300 ease-in-out"
                    href="{{ route('jobs') }}">Find Jobs</a></li>
            @auth
                @if (Auth::user()->prosesi === 'company')
                    <li class="text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                            class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </li>

                    <li><a class="text-md md:px-2 lg:px-6 py-3  hover:text-white hover:bg-primary font-semibold transition duration-300 ease-in-out"
                            href="{{ route('pricing') }}">Pricing</a></li>
                @endif     
            @endauth

            {{-- <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                    class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </li> --}}
            {{-- <li><a class="text-md md:px-2 lg:px-6 py-3  hover:text-white hover:bg-primary font-semibold transition duration-300 ease-in-out"
                    href="{{ route('home') }}">Contact</a></li> --}}
        </ul>
        <div class="hidden lg:block">
            @guest
                <a class=" focus:scale-90   py-3 px-6 bg-secondary hover:bg-blue-400 text-sm text-white font-bold  rounded-xl transition duration-200"
                    href="{{ route('login') }}">Sign In</a>
                <a class=" focus:scale-90  py-3 px-6 bg-primary hover:bg-red-400 text-sm text-white font-bold rounded-xl transition duration-200"
                    href="{{ route('register') }}">Sign up</a>
            @endguest

            @auth
                @if (Auth::user()->prosesi === 'user')
                    <a class=" focus:scale-90  py-3 px-6 bg-primary hover:bg-red-400 text-sm text-white font-bold rounded-xl transition duration-200"
                        href="{{ route('userdashboard') }}">Dashboard</a>
                @elseif (Auth::user()->prosesi === 'company')
                    <a class=" focus:scale-90  py-3 px-6 bg-primary hover:bg-red-400 text-sm text-white font-bold rounded-xl transition duration-200"
                        href="{{ route('company.dashboard') }}">Dashboard</a>
                @else
                    <a class=" focus:scale-90  py-3 px-6 bg-primary hover:bg-red-400 text-sm text-white font-bold rounded-xl transition duration-200"
                        href="{{ route('admin.dashboard') }}">Dashboard</a>
                @endif
            @endauth
        </div>
    </nav>

    {{-- Ini --}}
    <div id="sidebar"
        class="navbar-menu md:hidden z-50 absolute w-64 min-h-screen overflow-y-auto transition-transform transform -translate-x-full ease-in-out duration-300">
        <div class="navbar-backdrop  fixed left-0  opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-4">
                <a class="mr-auto text-3xl font-bold leading-none" href="{{ route('home') }}">
                    <img src="{{ asset('img/LogoJobSync.png') }}" class="w-30" alt="">
                </a>
                <button id="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold  hover:bg-primary hover:text-white transition duration-300 ease-in-out rounded"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold  hover:bg-primary hover:text-white transition duration-300 ease-in-out rounded"
                            href="{{ route('jobs') }}">Find Jobs</a>
                    </li>
                    @auth
                        @if (Auth::user()->prosesi === 'company')
                            <li class="mb-1">
                                <a class="block p-4 text-sm font-semibold  hover:bg-primary hover:text-white transition duration-300 ease-in-out rounded"
                                    href="{{ route('pricing') }}">Pricing</a>
                            </li>
                        @endif
                    @endauth
                    {{-- <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold  hover:bg-primary hover:text-white transition duration-300 ease-in-out rounded"
                            href="{{ route('home') }}">Contact</a>
                    </li> --}}
                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6">
                    @guest
                        <a class="block focus:scale-90 px-4 py-3 mb-3 text-xs text-center font-semibold leading-none text-white bg-secondary hover:bg-blue-200 rounded-xl"
                            href="{{ route('login') }}">Sign in</a>
                        <a class="block focus:scale-90 px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-primary hover:bg-red-400  rounded-xl"
                            href="{{ route('register') }}">Sign Up</a>
                    @endguest

                    @auth
                        @if (Auth::user()->prosesi === 'user')
                            <a class="block focus:scale-90 px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-primary hover:bg-red-400  rounded-xl"
                                href="{{ route('userdashboard') }}">Dashboard</a>
                        @elseif (Auth::user()->prosesi === 'company')
                            <a class="block focus:scale-90 px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-primary hover:bg-red-400  rounded-xl"
                                href="{{ route('company.dashboard') }}">Dashboard</a>
                        @else
                            <a class="block focus:scale-90 px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-primary hover:bg-red-400  rounded-xl"
                                href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @endif
                    @endauth
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2021</span>
                </p>
            </div>
        </nav>
    </div>
    </div>




    <section class="">
        @include('dashboard.components.partials.alert')
        @yield('content')
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');

            // Handle scroll effect
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            const sidebar = document.getElementById('sidebar');
            const openSidebarButton = document.getElementById('open-sidebar');
            const closeSidebarButton = document.getElementById('navbar-close');

            openSidebarButton.addEventListener('click', (e) => {
                e.stopPropagation();
                sidebar.classList.toggle('-translate-x-full');
            });

            // Close the sidebar when clicking outside of it
            document.addEventListener('click', (e) => {
                if (!sidebar.contains(e.target) && !openSidebarButton.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            });

            closeSidebarButton.addEventListener('click', (e) => {

                sidebar.classList.add('-translate-x-full'); // Adds class to close the sidebar
            });

        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @yield('customJs')
</body>

</html>
