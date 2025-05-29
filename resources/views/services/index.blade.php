<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Services - Cheerio Studio">
    <meta property="og:title" content="Services - Cheerio Studio">
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

    <title>Our Services - Cheerio Studio</title>
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
                    <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-amber-500 font-body">
                        Dashboard
                    </a>
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
                        </button>
                        
                        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50">
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
            
            <!-- Page Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold font-accent text-gray-900 dark:text-white uppercase mb-4">
                    Our Services
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 font-body max-w-3xl mx-auto">
                    Discover the comprehensive range of digital services we offer to help your business grow and succeed in the digital world.
                </p>
            </div>

            <!-- Category Filter -->
            <div class="mb-8">
                <div class="flex flex-wrap justify-center gap-2">
                    <a href="{{ route('services.index') }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200 
                              {{ request()->routeIs('services.index') ? 'bg-amber-500 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-amber-100 dark:hover:bg-gray-700' }}">
                        All Services
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('services.category', $cat) }}" 
                           class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200 
                                  bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-amber-100 dark:hover:bg-gray-700">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <!-- Service Image Placeholder -->
                        <div class="h-48 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($service->category === 'Web Development')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                @elseif($service->category === 'Design')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3v18"></path>
                                @elseif($service->category === 'Marketing')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                @endif
                            </svg>
                        </div>
                        
                        <div class="p-6">
                            <!-- Category Badge -->
                            <div class="mb-3">
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">
                                    {{ $service->category }}
                                </span>
                            </div>
                            
                            <!-- Service Name -->
                            <h3 class="text-xl font-bold font-accent text-gray-900 dark:text-white mb-3">
                                {{ $service->name }}
                            </h3>
                            
                            <!-- Short Description -->
                            <p class="text-gray-600 dark:text-gray-400 font-body mb-4">
                                {{ $service->short_description }}
                            </p>
                            
                            <!-- Features Preview -->
                            <div class="mb-4">
                                <ul class="text-sm text-gray-500 dark:text-gray-400 space-y-1">
                                    @foreach(array_slice($service->features, 0, 3) as $feature)
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                    @if(count($service->features) > 3)
                                        <li class="text-xs text-gray-400">+ {{ count($service->features) - 3 }} more features</li>
                                    @endif
                                </ul>
                            </div>
                            
                            <!-- Price and Duration -->
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <div class="text-2xl font-bold text-amber-600">{{ $service->formatted_price }}</div>
                                    <div class="text-sm text-gray-500">{{ $service->duration }}</div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <a href="{{ route('services.show', $service) }}" 
                                   class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-medium py-2 px-4 rounded-md text-center transition-colors duration-200">
                                    View Details
                                </a>
                                <a href="{{ route('services.contact', $service) }}" 
                                   class="flex-1 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium py-2 px-4 rounded-md text-center transition-colors duration-200">
                                    Get Quote
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($services->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No services available</h3>
                    <p class="mt-1 text-sm text-gray-500">Check back later for new services.</p>
                </div>
            @endif

            <!-- Call to Action -->
            <div class="mt-16 bg-amber-50 dark:bg-amber-900/20 rounded-lg p-8 text-center">
                <h2 class="text-2xl font-bold font-accent text-gray-900 dark:text-white mb-4">
                    Ready to Get Started?
                </h2>
                <p class="text-gray-600 dark:text-gray-400 font-body mb-6 max-w-2xl mx-auto">
                    Have a specific project in mind? Contact us today for a free consultation and custom quote tailored to your needs.
                </p>
                <a href="{{ route('home') }}#contact" 
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 transition-colors duration-200">
                    Contact Us Today
                </a>
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
