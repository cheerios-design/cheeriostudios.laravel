<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Profile Settings - Cheerio Studio">
    <meta property="og:title" content="Profile Settings - Cheerio Studio">
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

    <title>Profile Settings - Cheerio Studio</title>
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
    <main class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <!-- Header -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h1 class="text-2xl font-bold font-accent text-gray-900 dark:text-white uppercase">
                        Profile Settings
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 font-paragraph">
                        Update your account information and manage your profile.
                    </p>
                </div>
            </div>

            @if (session('status'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <!-- Profile Information -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white font-accent uppercase mb-4">
                        Profile Information
                    </h3>
                    
                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                        @csrf
                        @method('patch')
                        
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                                Full Name
                            </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" required 
                                    class="appearance-none relative block w-full px-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                    value="{{ old('name', Auth::user()->name) }}">
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                                Email Address
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" required 
                                    class="appearance-none relative block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                    value="{{ old('email', Auth::user()->email) }}">
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Account Information -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white font-accent uppercase mb-4">
                        Account Information
                    </h3>
                    
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Member Since</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ Auth::user()->created_at->format('F j, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Verified</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                @if(Auth::user()->email_verified_at)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Verified
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @endif
                            </dd>
                        </div>
                    </dl>

                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('password.edit') }}" 
                                class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                Change Password
                            </a>
                            <a href="{{ route('dashboard') }}" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Back to Dashboard
                            </a>
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
