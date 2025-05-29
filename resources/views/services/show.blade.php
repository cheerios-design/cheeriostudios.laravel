<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="{{ $service->short_description }} - Cheerio Studio">
    <meta property="og:title" content="{{ $service->name }} - Cheerio Studio">
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

    <title>{{ $service->name }} - Cheerio Studio</title>
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
                    <a href="{{ route('services.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-amber-500 font-body">
                        Services
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
            
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-600 dark:text-gray-400 dark:hover:text-white">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('services.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Services</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $service->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Service Details -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Service Header -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden mb-8">
                        <!-- Service Image -->
                        <div class="h-64 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <div class="mb-4">
                                <span class="inline-block px-3 py-1 text-sm font-medium bg-amber-100 text-amber-800 rounded-full">
                                    {{ $service->category }}
                                </span>
                            </div>
                            
                            <!-- Service Name -->
                            <h1 class="text-3xl font-bold font-accent text-gray-900 dark:text-white mb-4">
                                {{ $service->name }}
                            </h1>
                            
                            <!-- Short Description -->
                            <p class="text-xl text-gray-600 dark:text-gray-400 font-body mb-6">
                                {{ $service->short_description }}
                            </p>
                        </div>
                    </div>                    <!-- Detailed Description -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold font-accent text-gray-900 dark:text-white mb-4">About This Service</h2>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-gray-600 dark:text-gray-400 font-body leading-relaxed mb-6">
                                {{ $service->description }}
                            </p>
                            
                            <!-- Service-specific detailed content -->
                            @if($service->name === 'Web Design & Development')
                                <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg mb-4">
                                    <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2">Our Development Process</h3>
                                    <ul class="text-blue-800 dark:text-blue-200 space-y-1">
                                        <li>• Discovery & Planning Phase</li>
                                        <li>• UI/UX Design & Prototyping</li>
                                        <li>• Frontend & Backend Development</li>
                                        <li>• Testing & Quality Assurance</li>
                                        <li>• Launch & Post-Launch Support</li>
                                    </ul>
                                </div>
                            @elseif($service->name === 'Branding & Logo Design')
                                <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg mb-4">
                                    <h3 class="text-lg font-semibold text-purple-900 dark:text-purple-100 mb-2">Brand Identity Components</h3>
                                    <ul class="text-purple-800 dark:text-purple-200 space-y-1">
                                        <li>• Primary & Secondary Logos</li>
                                        <li>• Color Palette & Typography</li>
                                        <li>• Brand Voice & Messaging</li>
                                        <li>• Business Card & Stationery</li>
                                        <li>• Digital Assets & Guidelines</li>
                                    </ul>
                                </div>
                            @elseif($service->name === 'E-commerce Development')
                                <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg mb-4">
                                    <h3 class="text-lg font-semibold text-green-900 dark:text-green-100 mb-2">E-commerce Features</h3>
                                    <ul class="text-green-800 dark:text-green-200 space-y-1">
                                        <li>• Shopping Cart & Checkout</li>
                                        <li>• Payment Gateway Integration</li>
                                        <li>• Inventory Management System</li>
                                        <li>• Order Tracking & Management</li>
                                        <li>• Customer Account Portal</li>
                                    </ul>
                                </div>
                            @elseif($service->name === 'Social Media Management')
                                <div class="bg-pink-50 dark:bg-pink-900/20 p-4 rounded-lg mb-4">
                                    <h3 class="text-lg font-semibold text-pink-900 dark:text-pink-100 mb-2">Social Media Platforms</h3>
                                    <ul class="text-pink-800 dark:text-pink-200 space-y-1">
                                        <li>• Facebook & Instagram Management</li>
                                        <li>• LinkedIn Business Presence</li>
                                        <li>• Twitter/X Engagement</li>
                                        <li>• TikTok & YouTube Content</li>
                                        <li>• Platform-Specific Strategies</li>
                                    </ul>
                                </div>
                            @elseif($service->name === 'Custom Software Development')
                                <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg mb-4">
                                    <h3 class="text-lg font-semibold text-orange-900 dark:text-orange-100 mb-2">Development Technologies</h3>
                                    <ul class="text-orange-800 dark:text-orange-200 space-y-1">
                                        <li>• Laravel, React, Vue.js</li>
                                        <li>• Node.js & Python</li>
                                        <li>• Mobile App Development</li>
                                        <li>• Database Design & Optimization</li>
                                        <li>• Cloud Integration & Deployment</li>
                                    </ul>
                                </div>
                            @elseif($service->name === 'SEO Optimization')
                                <div class="bg-indigo-50 dark:bg-indigo-900/20 p-4 rounded-lg mb-4">
                                    <h3 class="text-lg font-semibold text-indigo-900 dark:text-indigo-100 mb-2">SEO Strategy Components</h3>
                                    <ul class="text-indigo-800 dark:text-indigo-200 space-y-1">
                                        <li>• Technical SEO Audit</li>
                                        <li>• Keyword Research & Analysis</li>
                                        <li>• Content Optimization</li>
                                        <li>• Local SEO (if applicable)</li>
                                        <li>• Link Building & Citations</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Process Timeline -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold font-accent text-gray-900 dark:text-white mb-6">Our Process</h2>
                        <div class="space-y-6">
                            @if($service->name === 'Web Design & Development')
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm">1</div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Discovery & Strategy</h3>
                                        <p class="text-gray-600 dark:text-gray-400">We analyze your requirements and create a comprehensive project plan.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm">2</div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Design & Prototyping</h3>
                                        <p class="text-gray-600 dark:text-gray-400">Create wireframes, mockups, and interactive prototypes for your approval.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm">3</div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Development & Testing</h3>
                                        <p class="text-gray-600 dark:text-gray-400">Build your website with clean code and thorough testing across all devices.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm">4</div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Launch & Support</h3>
                                        <p class="text-gray-600 dark:text-gray-400">Deploy your website and provide ongoing maintenance and support.</p>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold text-sm">1</div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Consultation & Planning</h3>
                                        <p class="text-gray-600 dark:text-gray-400">We discuss your goals and create a tailored strategy for your project.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold text-sm">2</div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Implementation</h3>
                                        <p class="text-gray-600 dark:text-gray-400">Execute the strategy with regular updates and milestone reviews.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold text-sm">3</div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Review & Optimization</h3>
                                        <p class="text-gray-600 dark:text-gray-400">Analyze results and optimize for better performance and outcomes.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>                    <!-- Features -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold font-accent text-gray-900 dark:text-white mb-6">What's Included</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($service->features as $feature)
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300 font-body">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Pricing Details -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold font-accent text-gray-900 dark:text-white mb-6">Pricing & Packages</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @if($service->name === 'Web Design & Development')
                                <!-- Basic Package -->
                                <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Basic Website</h3>
                                    <div class="text-3xl font-bold text-blue-600 mb-4">$1,500</div>
                                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li>• Up to 5 pages</li>
                                        <li>• Responsive design</li>
                                        <li>• Basic SEO setup</li>
                                        <li>• Contact form</li>
                                        <li>• 3 months support</li>
                                    </ul>
                                </div>
                                <!-- Standard Package -->
                                <div class="border-2 border-blue-500 rounded-lg p-6 relative hover:shadow-lg transition-shadow">
                                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">Most Popular</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Standard Website</h3>
                                    <div class="text-3xl font-bold text-blue-600 mb-4">{{ $service->formatted_price }}</div>
                                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li>• Up to 10 pages</li>
                                        <li>• Advanced features</li>
                                        <li>• SEO optimization</li>
                                        <li>• CMS integration</li>
                                        <li>• 6 months support</li>
                                    </ul>
                                </div>
                                <!-- Premium Package -->
                                <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Premium Website</h3>
                                    <div class="text-3xl font-bold text-blue-600 mb-4">$4,500</div>
                                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li>• Unlimited pages</li>
                                        <li>• Custom functionality</li>
                                        <li>• Advanced SEO</li>
                                        <li>• E-commerce ready</li>
                                        <li>• 12 months support</li>
                                    </ul>
                                </div>
                            @elseif($service->name === 'E-commerce Development')
                                <!-- Starter Package -->
                                <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Starter Store</h3>
                                    <div class="text-3xl font-bold text-green-600 mb-4">$2,500</div>
                                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li>• Up to 50 products</li>
                                        <li>• Basic payment gateway</li>
                                        <li>• Order management</li>
                                        <li>• Mobile responsive</li>
                                        <li>• 3 months support</li>
                                    </ul>
                                </div>
                                <!-- Professional Package -->
                                <div class="border-2 border-green-500 rounded-lg p-6 relative hover:shadow-lg transition-shadow">
                                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Most Popular</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Professional Store</h3>
                                    <div class="text-3xl font-bold text-green-600 mb-4">{{ $service->formatted_price }}</div>
                                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li>• Unlimited products</li>
                                        <li>• Multiple payment options</li>
                                        <li>• Inventory management</li>
                                        <li>• Customer accounts</li>
                                        <li>• 6 months support</li>
                                    </ul>
                                </div>
                                <!-- Enterprise Package -->
                                <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Enterprise Store</h3>
                                    <div class="text-3xl font-bold text-green-600 mb-4">$8,500</div>
                                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li>• Custom integrations</li>
                                        <li>• Advanced analytics</li>
                                        <li>• Multi-vendor support</li>
                                        <li>• API development</li>
                                        <li>• 12 months support</li>
                                    </ul>
                                </div>
                            @else
                                <!-- Single pricing display for other services -->
                                <div class="col-span-3">
                                    <div class="bg-gradient-to-r from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 rounded-lg p-8 text-center">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $service->name }}</h3>
                                        <div class="text-4xl font-bold text-amber-600 mb-4">{{ $service->formatted_price }}</div>
                                        <p class="text-gray-600 dark:text-gray-400 mb-6">{{ $service->duration }}</p>
                                        <div class="inline-flex items-center text-sm text-amber-700 dark:text-amber-300">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Custom quotes available based on project scope
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold font-accent text-gray-900 dark:text-white mb-6">Frequently Asked Questions</h2>
                        <div class="space-y-4">
                            @if($service->name === 'Web Design & Development')
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Do you provide hosting services?</h3>
                                    <p class="text-gray-600 dark:text-gray-400">While we don't provide hosting directly, we can recommend reliable hosting providers and help you set up your website on your chosen platform.</p>
                                </div>
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Will my website be mobile-friendly?</h3>
                                    <p class="text-gray-600 dark:text-gray-400">Absolutely! All our websites are built with a mobile-first approach and are fully responsive across all devices.</p>
                                </div>
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Can I update content myself?</h3>
                                    <p class="text-gray-600 dark:text-gray-400">Yes! We integrate user-friendly content management systems that allow you to easily update text, images, and other content.</p>
                                </div>
                            @elseif($service->name === 'SEO Optimization')
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">How long does it take to see SEO results?</h3>
                                    <p class="text-gray-600 dark:text-gray-400">SEO is a long-term strategy. You may see initial improvements within 2-3 months, with significant results typically appearing after 6 months of consistent optimization.</p>
                                </div>
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Do you guarantee first page rankings?</h3>
                                    <p class="text-gray-600 dark:text-gray-400">While we can't guarantee specific rankings due to search engine algorithm changes, we focus on best practices that improve your overall visibility and traffic.</p>
                                </div>
                            @else
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">What's included in the initial consultation?</h3>
                                    <p class="text-gray-600 dark:text-gray-400">We'll discuss your goals, analyze your current situation, and provide recommendations tailored to your specific needs and budget.</p>
                                </div>
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">How do you measure success?</h3>
                                    <p class="text-gray-600 dark:text-gray-400">We establish clear KPIs at the beginning of each project and provide regular reports showing progress toward your goals.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Service Info Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8 sticky top-6">
                        <h3 class="text-xl font-bold font-accent text-gray-900 dark:text-white mb-6">Service Details</h3>
                        
                        <!-- Price -->
                        <div class="mb-6">
                            <div class="text-3xl font-bold text-amber-600 mb-1">{{ $service->formatted_price }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Starting price</div>
                        </div>

                        <!-- Duration -->
                        <div class="mb-6">
                            <div class="flex items-center text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="font-medium">Duration:</span>
                            </div>
                            <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $service->duration }}</div>
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <div class="flex items-center text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="font-medium">Category:</span>
                            </div>
                            <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $service->category }}</div>
                        </div>

                        <!-- Key Benefits -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Key Benefits</h4>
                            <div class="space-y-2">
                                @if($service->name === 'Web Design & Development')
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Boost online presence
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Increase credibility
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Generate more leads
                                    </div>
                                @elseif($service->name === 'SEO Optimization')
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Higher search rankings
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Increased organic traffic
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Better ROI than ads
                                    </div>
                                @else
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Professional results
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Expert guidance
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Ongoing support
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <a href="{{ route('services.contact', $service) }}" 
                               class="w-full bg-amber-600 hover:bg-amber-700 text-white font-medium py-3 px-4 rounded-md text-center block transition-colors duration-200 transform hover:scale-105">
                                Get Free Quote
                            </a>
                            <a href="tel:+1234567890" 
                               class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-md text-center block transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Call Now
                            </a>
                            <a href="{{ route('home') }}#contact" 
                               class="w-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium py-3 px-4 rounded-md text-center block transition-colors duration-200">
                                Contact Us
                            </a>
                        </div>

                        <!-- Guarantee Badge -->
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-600">
                            <div class="flex items-center justify-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span>100% Satisfaction Guarantee</span>
                            </div>
                        </div>
                    </div>

                    <!-- Why Choose Us -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold font-accent text-gray-900 dark:text-white mb-4">Why Choose Cheerio Studio?</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Fast Delivery</h4>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Quick turnaround times without compromising quality</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Expert Team</h4>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Experienced professionals in every field</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">24/7 Support</h4>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Always here when you need assistance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Services -->
            @if($relatedServices->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold font-accent text-gray-900 dark:text-white mb-8">Related Services</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedServices as $relatedService)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                                <!-- Service Image Placeholder -->
                                <div class="h-32 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if($relatedService->category === 'Web Development')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                        @elseif($relatedService->category === 'Design')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3v18"></path>
                                        @elseif($relatedService->category === 'Marketing')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        @endif
                                    </svg>
                                </div>
                                
                                <div class="p-4">
                                    <h3 class="text-lg font-bold font-accent text-gray-900 dark:text-white mb-2">
                                        {{ $relatedService->name }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-400 font-body text-sm mb-3">
                                        {{ Str::limit($relatedService->short_description, 80) }}
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <div class="text-lg font-bold text-amber-600">{{ $relatedService->formatted_price }}</div>
                                        <a href="{{ route('services.show', $relatedService) }}" 
                                           class="text-amber-600 hover:text-amber-700 font-medium text-sm">
                                            View Details →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
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
