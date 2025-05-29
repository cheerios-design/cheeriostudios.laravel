<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Dashboard - Cheerio Studio">
    <meta property="og:title" content="Dashboard - Cheerio Studio">
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

    <title>Dashboard - Cheerio Studio</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-900 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('assets/svg/black-trans.svg') }}" class="h-8" alt="Cheerio Studio Logo">
                        <span class="self-center text-xl font-heading uppercase text-gray-900 dark:text-white">
                            cheerio studios
                        </span>
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button id="userMenuButton" type="button" 
                            class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500" 
                            onclick="toggleUserMenu()">
                            <span class="sr-only">Open user menu</span>
                            <div class="w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-medium text-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <span class="ml-2 text-gray-700 dark:text-gray-300 font-body">{{ Auth::user()->name }}</span>
                        </button>                        <div id="userMenu" class="user-menu hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" 
                                    class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 font-medium">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Admin Panel
                                </a>
                                <hr class="my-1 border-gray-200 dark:border-gray-600">
                            @endif
                            <a href="{{ route('profile.edit') }}" 
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Profile Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
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

            <!-- Welcome Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h1 class="text-2xl font-bold font-accent text-gray-900 dark:text-white uppercase mb-2">
                        Welcome back, {{ Auth::user()->name }}!
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 font-paragraph">
                        You're now logged into your Cheerio Studio dashboard. Here you can manage your projects, view our services, and track your account details.
                    </p>
                </div>
            </div>            <!-- Dashboard Grid -->
            <div class="dashboard-grid"><!-- Account Info Card -->
                <div class="dashboard-card bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate font-body">
                                        Account Info
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900 dark:text-white font-accent">
                                        {{ Auth::user()->email }}
                                    </dd>
                                    @if(Auth::user()->last_login_at)
                                        <dd class="text-sm text-gray-500 dark:text-gray-400 font-paragraph">
                                            Last login: {{ Auth::user()->last_login_at->diffForHumans() }}
                                        </dd>
                                    @endif
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                        <div class="text-sm">
                            <a href="{{ route('profile.edit') }}" class="font-medium text-amber-600 hover:text-amber-500">
                                View profile settings
                            </a>
                        </div>
                    </div>
                </div>                <!-- Projects Card -->
                <div class="dashboard-card bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate font-body">
                                        Active Projects
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900 dark:text-white font-accent">
                                        0 Projects
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                        <div class="text-sm">
                            <a href="#contact" class="font-medium text-amber-600 hover:text-amber-500">
                                Start new project
                            </a>
                        </div>                    </div>
                </div>                <!-- Services Card -->
                <div class="dashboard-card bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-amber-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate font-body">
                                        Our Services
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900 dark:text-white font-accent">
                                        Browse & Order
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                        <div class="text-sm">
                            <a href="{{ route('services.index') }}" class="font-medium text-amber-600 hover:text-amber-500">
                                Browse services →
                            </a>                        </div>
                    </div>
                </div>
            </div>            <!-- Services Section -->
            <div class="mt-8">
                <div class="dashboard-card bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white font-accent uppercase">
                                    Our Services
                                </h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 font-paragraph">
                                    Professional services to help your business grow
                                </p>
                            </div>
                            <a href="{{ route('services.index') }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-amber-700 bg-amber-100 hover:bg-amber-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                View All Services
                                <svg class="ml-2 -mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Individual Service Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">                            <!-- Web Design & Development -->
                            <a href="{{ route('services.show', ['service' => 1]) }}" 
                               class="service-card-hover group bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-6 hover:shadow-lg transition-all duration-200 border border-blue-200 dark:border-blue-700">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-lg font-semibold text-blue-900 dark:text-blue-100 group-hover:text-blue-700">
                                            Web Design & Development
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-sm text-blue-700 dark:text-blue-300 mb-4">
                                    Custom responsive websites built with modern technologies
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-blue-600">From $2,500</span>
                                    <span class="text-xs text-blue-600 group-hover:text-blue-800">View Details →</span>
                                </div>
                            </a>                            <!-- Branding & Logo Design -->
                            <a href="{{ route('services.show', ['service' => 2]) }}" 
                               class="service-card-hover group bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg p-6 hover:shadow-lg transition-all duration-200 border border-purple-200 dark:border-purple-700">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h4a2 2 0 002-2V9a2 2 0 00-2-2H7a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-lg font-semibold text-purple-900 dark:text-purple-100 group-hover:text-purple-700">
                                            Branding & Logo Design
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-sm text-purple-700 dark:text-purple-300 mb-4">
                                    Professional brand identity that makes you stand out
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-purple-600">From $1,200</span>
                                    <span class="text-xs text-purple-600 group-hover:text-purple-800">View Details →</span>
                                </div>
                            </a>                            <!-- E-commerce Development -->
                            <a href="{{ route('services.show', ['service' => 3]) }}" 
                               class="service-card-hover group bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg p-6 hover:shadow-lg transition-all duration-200 border border-green-200 dark:border-green-700">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-lg font-semibold text-green-900 dark:text-green-100 group-hover:text-green-700">
                                            E-commerce Development
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-sm text-green-700 dark:text-green-300 mb-4">
                                    Complete online store solutions with payment integration
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-green-600">From $4,500</span>
                                    <span class="text-xs text-green-600 group-hover:text-green-800">View Details →</span>
                                </div>
                            </a>                            <!-- Social Media Management -->
                            <a href="{{ route('services.show', ['service' => 4]) }}" 
                               class="service-card-hover group bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 rounded-lg p-6 hover:shadow-lg transition-all duration-200 border border-pink-200 dark:border-pink-700">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-pink-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-lg font-semibold text-pink-900 dark:text-pink-100 group-hover:text-pink-700">
                                            Social Media Management
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-sm text-pink-700 dark:text-pink-300 mb-4">
                                    Strategic social media presence to grow your audience
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-pink-600">From $800/mo</span>
                                    <span class="text-xs text-pink-600 group-hover:text-pink-800">View Details →</span>
                                </div>
                            </a>                            <!-- Custom Software Development -->
                            <a href="{{ route('services.show', ['service' => 5]) }}" 
                               class="service-card-hover group bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-6 hover:shadow-lg transition-all duration-200 border border-orange-200 dark:border-orange-700">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-lg font-semibold text-orange-900 dark:text-orange-100 group-hover:text-orange-700">
                                            Custom Software Development
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-sm text-orange-700 dark:text-orange-300 mb-4">
                                    Tailored software solutions for your business needs
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-orange-600">From $6,000</span>
                                    <span class="text-xs text-orange-600 group-hover:text-orange-800">View Details →</span>
                                </div>
                            </a>                            <!-- SEO Optimization -->
                            <a href="{{ route('services.show', ['service' => 6]) }}" 
                               class="service-card-hover group bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 rounded-lg p-6 hover:shadow-lg transition-all duration-200 border border-indigo-200 dark:border-indigo-700">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="text-lg font-semibold text-indigo-900 dark:text-indigo-100 group-hover:text-indigo-700">
                                            SEO Optimization
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-sm text-indigo-700 dark:text-indigo-300 mb-4">
                                    Improve your search engine rankings and visibility
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-indigo-600">From $1,500</span>
                                    <span class="text-xs text-indigo-600 group-hover:text-indigo-800">View Details →</span>
                                </div>
                            </a>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-600">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    Need help choosing the right service? 
                                    <a href="{{ route('services.contact') }}" class="font-medium text-amber-600 hover:text-amber-500">
                                        Contact our team
                                    </a>
                                </div>
                                <div class="flex space-x-3">
                                    <a href="{{ route('services.contact') }}" 
                                       class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                        Get Quote
                                    </a>
                                    <a href="{{ route('services.index') }}" 
                                       class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                        Browse All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            <!-- Admin Panel Access Card -->
            @if(Auth::user()->isAdmin())
            <div class="mt-8 dashboard-card bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 overflow-hidden shadow rounded-lg border-2 border-red-200 dark:border-red-700">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-red-500 rounded-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-red-600 dark:text-red-400 truncate font-body">
                                    Admin Access
                                </dt>
                                <dd class="text-lg font-medium text-red-800 dark:text-red-300 font-accent">
                                    System Management
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-red-100 dark:bg-red-800/30 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('admin.dashboard') }}" class="font-medium text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300">
                            Access Admin Panel →
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>        <!-- Recent Activity -->
        <div class="mt-8">
            <div class="dashboard-card bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white font-accent uppercase">
                        Recent Activity
                    </h3>
                    <div class="mt-5">
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white font-body">No activity yet</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 font-paragraph">
                                Get started by exploring our services or contacting us for a new project.
                            </p>                            <div class="mt-6">
                                <div class="flex space-x-3">
                                    <a href="{{ route('services.index') }}" 
                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                        Browse Services
                                    </a>
                                    <a href="{{ route('services.contact') }}" 
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            menu.classList.toggle('hidden');
        }

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const button = document.getElementById('userMenuButton');
            const menu = document.getElementById('userMenu');
            
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
