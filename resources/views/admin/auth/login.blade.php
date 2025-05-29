<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Admin Login - Cheerio Studio">
    <meta property="og:title" content="Admin Login - Cheerio Studio">
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

    <title>Admin Login - Cheerio Studio</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="flex justify-center">
                    <img src="{{ asset('assets/svg/black-trans.svg') }}" class="h-12 w-auto" alt="Cheerio Studio Logo">
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold font-accent text-gray-900 dark:text-white uppercase">
                    Admin Login
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400 font-paragraph">
                    Access the admin dashboard
                </p>
                <!-- Admin Badge -->
                <div class="flex justify-center mt-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 border border-red-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Admin Access Required
                    </span>
                </div>
            </div>

            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('admin.login') }}" method="POST">
                @csrf
                
                <div class="space-y-4">
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                            Email Address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" required 
                                class="appearance-none relative block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                placeholder="Enter your admin email address"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required 
                                class="appearance-none relative block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                placeholder="Enter your admin password">
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                            class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900 dark:text-gray-300 font-body">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-red-600 hover:text-red-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-red-500 group-hover:text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Access Admin Dashboard
                    </button>
                </div>

                <div class="text-center space-y-2">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-red-500 font-paragraph">
                        ← Regular User Login
                    </a>
                    <br>
                    <a href="{{ route('home') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-red-500 font-paragraph">
                        Back to Homepage
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
