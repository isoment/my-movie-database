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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <livewire:styles>
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
                            <a href="{{route('movies.top')}}"
                               class="block sm:inline-block mt-2 sm:mt-0 text-white 
                                     font-semibold sm:text-sm ml-4 text-base hover:text-gray-200">
                                Movies
                            </a>
                            <a href="{{route('tv.top')}}" 
                               class="block sm:inline-block mt-2 sm:mt-0 text-white 
                                     font-semibold sm:text-sm text-base ml-4 hover:text-gray-200">
                                TV Shows
                            </a>
                            <a href="{{route('people.popular')}}" 
                               class="block sm:inline-block mt-2 sm:mt-0 text-white 
                                     font-semibold sm:text-sm text-base ml-4 hover:text-gray-200">
                                People
                            </a>
                        </div>
                        <div class="flex flex-col md:flex-row text-sm">
                            @guest
                                <a href="{{ route('login') }}" 
                                   class="block sm:font-semibold sm:inline-block mt-4 sm:mt-0 text-gray-300 
                                   sm:text-white mr-4 ml-4 hover:text-gray-200">{{ __('Login') }}</a>
                                <a href="{{ route('register') }}" 
                                   class="block sm:font-semibold sm:inline-block mt-2 sm:mt-0 text-gray-300 
                                   sm:text-white mr-4 ml-4 hover:text-gray-200">{{ __('Register') }}</a>
                            @else
                                <a href="{{ route('home') }}"
                                    class="block sm:font-semibold sm:inline-block mt-4 sm:mt-0 text-gray-300 
                                    sm:text-white mr-4 ml-4 hover:text-gray-200">Home</a>
                                <a href="{{ route('logout') }}"
                                    class="sm:font-semibold block sm:inline-block mt-4 sm:mt-0 text-gray-300 sm:text-white ml-4 mr-4 hover:text-gray-200"
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

    </div>
    @yield('scripts')
    <livewire:scripts>
</body>
</html>
