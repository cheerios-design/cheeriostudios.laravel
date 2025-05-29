<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Change Password - Cheerio Studio">
    <meta property="og:title" content="Change Password - Cheerio Studio">
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

    <title>Change Password - Cheerio Studio</title>
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
                    <a href="{{ route('profile.edit') }}" class="text-gray-600 dark:text-gray-300 hover:text-amber-500 font-body">
                        Profile
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
                        Change Password
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 font-paragraph">
                        Update your password to keep your account secure.
                    </p>
                </div>
            </div>

            @if (session('status'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <!-- Change Password Form -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white font-accent uppercase mb-4">
                        Update Password
                    </h3>
                    
                    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                        @csrf
                        @method('put')
                        
                        <!-- Current Password Field -->
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                                Current Password
                            </label>
                            <div class="mt-1">
                                <input id="current_password" name="current_password" type="password" required 
                                    class="appearance-none relative block w-full px-3 py-2 border @error('current_password') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                    placeholder="Enter your current password">
                            </div>
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- New Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                                New Password
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required 
                                    class="appearance-none relative block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                    placeholder="Enter your new password">
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm New Password Field -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                                Confirm New Password
                            </label>
                            <div class="mt-1">
                                <input id="password_confirmation" name="password_confirmation" type="password" required 
                                    class="appearance-none relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                    placeholder="Confirm your new password">
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <a href="{{ route('profile.edit') }}" 
                                class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Security Tips -->
            <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200 font-body">
                            Password Security Tips
                        </h3>
                        <div class="mt-2 text-sm text-blue-700 dark:text-blue-300 font-paragraph">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Use at least 8 characters</li>
                                <li>Include uppercase and lowercase letters</li>
                                <li>Add numbers and special characters</li>
                                <li>Avoid using personal information</li>
                                <li>Don't reuse passwords from other accounts</li>
                            </ul>
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
