<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Cheerio Studio - Empowering businesses through web and graphic design solutions.">
    <meta property="og:title" content="Cheerio Studio Website/Portfolio">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://cheeriostudios.com/assets/png/sticker-dark.png">
    <meta property="og:url" content="website">
    <meta property="twitter:card" content="summary_large_image">    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&family=Poiret+One&family=Sulphur+Point:wght@300;400;700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/svg/black-trans.svg') }}">
    <link rel="manifest" href="{{ asset('scripts/manifest.json') }}">

    <title>Cheerio Studio</title>
</head>

<body>
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 animate-slide-in-top">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">            
            <a href="https://www.cheeriostudios.com/" class="flex items-center space-x-3 rtl:space-x-reverse animate-fade-in-left">
                <img src="{{ asset('assets/svg/black-trans.svg') }}" class="h-8" alt="cheeriostudios Logo">
                <span class="self-center text-2xl font-heading uppercase whitespace-nowrap dark:text-white">cheerio
                    studios</span>
            </a>            <div class="flex md:order-2 space-x-3 md:space-x-2 rtl:space-x-reverse animate-fade-in-right delay-200">
                @auth
                    <!-- Dashboard Button (when authenticated) -->
                    <a href="{{ route('dashboard') }}">
                        <button type="button"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-500 to-blue-500 group-hover:from-green-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-500 trust-card glow-effect">
                            <span
                                class="relative px-4 py-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                                Dashboard
                            </span>
                        </button>
                    </a>
                    
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg border border-red-500 hover:bg-red-50 dark:text-white dark:border-red-400 dark:hover:bg-red-900/20 focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800 transition-all duration-300">
                            <span class="relative px-4 py-2 transition-all ease-in duration-75 rounded-md">
                                Logout
                            </span>
                        </button>
                    </form>
                @else
                    <!-- Sign In Button (when not authenticated) -->
                    <a href="{{ url('sign-in') }}">
                        <button type="button"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg border border-amber-500 hover:bg-amber-50 dark:text-white dark:border-amber-400 dark:hover:bg-amber-900/20 focus:ring-4 focus:outline-none focus:ring-amber-200 dark:focus:ring-amber-800 transition-all duration-300">
                            <span class="relative px-4 py-2 transition-all ease-in duration-75 rounded-md">
                                Sign In
                            </span>
                        </button>
                    </a>
                    
                    <!-- Sign Up Button (when not authenticated) -->
                    <a href="{{ url('sign-up') }}">
                        <button type="button"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-yellow-500 to-orange-400 group-hover:from-yellow-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-yellow-200 dark:focus:ring-yellow-500 trust-card glow-effect">
                            <span
                                class="relative px-4 py-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                                Sign Up
                            </span>
                        </button>
                    </a>
                @endauth
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false" id="navbar-toggle">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 animate-fade-in-up delay-300" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-accent border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#about"
                            class="block py-2 px-3 uppercase font-body text-gray-900 rounded-sm hover:bg-amber-500 md:hover:bg-transparent md:hover:text-amber-500 md:p-0 md:dark:hover:text-amber-500 dark:text-white dark:hover:bg-amber-500 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300">About</a>
                    </li>
                    <li>
                        <a href="#projects"
                            class="block py-2 px-3 uppercase font-body text-gray-900 rounded-sm hover:bg-amber-500 md:hover:bg-transparent md:hover:text-amber-500 md:p-0 md:dark:hover:text-amber-500 dark:text-white dark:hover:bg-amber-500 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300">Projects</a>
                    </li>
                    <li>
                        <a href="#services"
                            class="block py-2 px-3 uppercase font-body text-gray-900 rounded-sm hover:bg-amber-500 md:hover:bg-transparent md:hover:text-amber-500 md:p-0 md:dark:hover:text-amber-500 dark:text-white dark:hover:bg-amber-500 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300">Services</a>
                    </li>
                    <li>
                        <a href="#contact"
                            class="block py-2 px-3 uppercase font-body text-gray-900 rounded-sm hover:bg-amber-500 md:hover:bg-transparent md:hover:text-amber-500 md:p-0 md:dark:hover:text-amber-500 dark:text-white dark:hover:bg-amber-500 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>