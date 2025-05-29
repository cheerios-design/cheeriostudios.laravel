<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Admin Dashboard - Cheerio Studio">
    <meta property="og:title" content="Admin Dashboard - Cheerio Studio">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://cheeriostudios.com/assets/png/sticker-dark.png">
    <meta property="og:url" content="website">
    <meta property="twitter:card" content="summary_large_image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&family=Poiret+One&family=Sulphur+Point:wght@300;400;700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/svg/black-trans.svg') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') - Cheerio Studio</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <!-- Admin Navigation -->
    <nav class="bg-white dark:bg-gray-900 shadow-sm border-b-2 border-red-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('assets/svg/black-trans.svg') }}" class="h-8" alt="Cheerio Studio Logo">
                        <span class="self-center text-xl font-heading uppercase text-gray-900 dark:text-white">
                            Admin Panel
                        </span>
                    </a>
                    <div class="ml-6 hidden md:flex space-x-4">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-red-100 text-red-700' : 'text-gray-500 hover:text-gray-700' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.users') }}" 
                           class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.users*') ? 'bg-red-100 text-red-700' : 'text-gray-500 hover:text-gray-700' }}">
                            Users
                        </a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- User Dashboard Link -->
                    <a href="{{ route('dashboard') }}" 
                       class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                        User Dashboard
                    </a>

                    <!-- Admin Badge -->
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Admin
                    </span>

                    <!-- User Menu -->
                    <div class="relative">
                        <button id="adminUserMenuButton" type="button" 
                            class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" 
                            onclick="toggleAdminUserMenu()">
                            <span class="sr-only">Open user menu</span>
                            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-medium text-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <span class="ml-2 text-gray-700 dark:text-gray-300 font-body">{{ Auth::user()->name }}</span>
                            <svg class="w-5 h-5 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="adminUserDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                User Dashboard
                            </a>
                            <a href="{{ url('/settings/profile') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">                            <a href="{{ route('profile.edit') }}" 
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Profile Settings
                            </a>
                            <hr class="my-1 border-gray-200 dark:border-gray-600">
                            <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white dark:bg-gray-800 border-b">
            <a href="{{ route('admin.dashboard') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-red-100 text-red-700' : 'text-gray-500 hover:text-gray-700' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.users') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.users*') ? 'bg-red-100 text-red-700' : 'text-gray-500 hover:text-gray-700' }}">
                Users
            </a>
        </div>
    </div>

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- JavaScript for dropdown functionality -->
    <script>
        function toggleAdminUserMenu() {
            const dropdown = document.getElementById('adminUserDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const button = document.getElementById('adminUserMenuButton');
            const dropdown = document.getElementById('adminUserDropdown');
            
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
