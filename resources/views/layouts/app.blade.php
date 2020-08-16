<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen antialiased leading-none font-sans">
    <div id="app">

        <nav class="bg-primary-blue-dark shadow py-2">
            <div class="container mx-auto px-8">
                <div class="flex items-center justify-between flex-wrap">

                    <div class="mr-6 flex items-center">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            <img src="/img/logo.svg" alt="logo" class="h-10">
                        </a>
                    </div>


                    <div class="cursor-pointer block sm:hidden text-white">
                        <svg class="navbar-burger w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" 
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </div>

                    <div id="main-nav" class="w-full flex-grow sm:flex items-center sm:w-auto hidden pb-4 sm:pb-0">
                        <div class="text-sm sm:flex-grow mt-4 sm:mt-0">
                            <a href="#" 
                               class="block sm:inline-block mt-2 sm:mt-0 text-white 
                                     font-semibold sm:text-sm ml-4 text-base">
                                Movies
                            </a>
                            <a href="#" 
                               class="block sm:inline-block mt-2 sm:mt-0 text-white 
                                     font-semibold sm:text-sm text-base ml-4">
                                TV Shows
                            </a>
                            <a href="#" 
                               class="block sm:inline-block mt-2 sm:mt-0 text-white 
                                     font-semibold sm:text-sm text-base ml-4">
                                People
                            </a>
                        </div>
                        <div class="flex flex-col md:flex-row text-sm">
                            @guest
                                <a href="{{ route('login') }}" class="block sm:font-semibold sm:inline-block mt-4 sm:mt-0 text-gray-300 sm:text-white mr-4 ml-4">{{ __('Login') }}</a>
                                <a href="{{ route('register') }}" class="block sm:font-semibold sm:inline-block mt-2 sm:mt-0 text-gray-300 sm:text-white mr-4 ml-4">{{ __('Register') }}</a>
                            @else 
                                <a href="{{ route('logout') }}"
                                    class="sm:font-semibold block sm:inline-block mt-4 sm:mt-0 text-gray-300 sm:text-white ml-4 mr-4"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            @endguest
                        </div>
                    </div>

                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="bg-primary-blue-dark text-white py-6">
            <div class="container mx-auto flex flex-col md:flex-row px-12 md:px-12 lg:px-32 xl:px-64 md:mb-12">
                <div class="flex flex-col mt-9 md:mr-8">
                    <img src="/img/logo.svg" alt="footer-logo" class="h-10 md:h-12 hidden md:block">
                    <div class="bg-white text-primary-blue-med mt-4 text-center p-2 rounded-lg
                                font-bold border-2 border-primary-red" style="max-width: 250px">
                        {{auth()->user() ? 'Hi ' . auth()->user()->name . '!' : 'Join Now!'}}
                    </div>
                </div>
                <div class="md:ml-10 mt-8 md:mt-9 flex flex-col">
                    <h2 class="font-bold md:mb-2 uppercase text-lg">The Basics</h2>
                    <a href="#" class="mt-1">Movies</a>
                    <a href="#" class="mt-1">TV Shows</a>
                    <a href="#" class="mt-1">People</a>
                    <a href="#" class="mt-1">Trending</a>
                    <a href="#" class="mt-1">Now Playing</a>
                </div>
                <div class="md:ml-10 mt-8 md:mt-9 flex flex-col">
                    <h2 class="font-bold md:mb-2 uppercase text-lg">Other</h2>
                    <a href="#" class="mt-1">Item</a>
                    <a href="#" class="mt-1">Other</a>
                    <a href="#" class="mt-1">This</a>
                    <a href="#" class="mt-1">That</a>
                </div>
                <div class="md:ml-10 mt-8 mb-6 md:mb-0 md:mt-9 flex flex-col">
                    <h2 class="font-bold md:mb-2 uppercase text-lg">API</h2>
                    <a href="https://www.themoviedb.org" class="mt-1">The Movie Database</a>
                    <a href="https://www.themoviedb.org/documentation/api" class="mt-1">API Documentation</a>
                    <a href="#" class="mt-1">Attribution</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
