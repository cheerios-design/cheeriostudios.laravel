<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sam Daramroei">
    <meta name="description" content="Sign up for Cheerio Studio">
    <meta property="og:title" content="Sign Up - Cheerio Studio">
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

    <title>Sign Up - Cheerio Studio</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="flex justify-center">
                    <img src="{{ asset('assets/svg/black-trans.svg') }}" class="h-12 w-auto" alt="Cheerio Studio Logo">
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold font-accent text-gray-900 dark:text-white uppercase">
                    Create your account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400 font-paragraph">
                    Or
                    <a href="{{ url('login') }}" class="font-medium text-amber-400 hover:text-amber-500">
                        sign in to your existing account
                    </a>
                </p>
            </div>

            <form class="mt-8 space-y-6" action="{{ url('register') }}" method="POST">
                @csrf
                
                <div class="space-y-4">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                            Full Name
                        </label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required 
                                class="appearance-none relative block w-full px-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                placeholder="Enter your full name"
                                value="{{ old('name') }}">
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
                                placeholder="Enter your email address"
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
                                class="appearance-none relative block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                placeholder="Enter your password">
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 font-body">
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required 
                                class="appearance-none relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                                placeholder="Confirm your password">
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-br from-yellow-500 to-orange-400 hover:from-yellow-600 hover:to-orange-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300">
                        Create Account
                    </button>
                </div>

                <div class="text-center">
                    <a href="{{ route('home') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-amber-500 font-paragraph">
                        ← Back to Homepage
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
