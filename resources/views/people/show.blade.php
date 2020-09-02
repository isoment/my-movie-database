@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 my-12">
            <div class="md:col-span-1">
                <div class="profile-photo">
                    <img src="{{ $people['profile_path'] ? 
                                 'https://image.tmdb.org/t/p/w300' . $people['profile_path'] :
                                 '/img/No-Profile-Pic.svg' }}" alt="Profile Photo"
                         class="rounded-lg {{ $people['profile_path'] ? '' : 'bg-gray-100 height-no-profile'}}">
                </div>
                <div class="md:hidden mt-4">
                    <h1 class="text-3xl font-bold">{{$people['name']}}</h1>
                    @if (isset($people['birthday']))
                        <p class="text-gray-500 text-sm mt-2">{{$age}} years old</p>
                    @endif
                    <h3 class="text-lg font-bold mt-12 mb-4">Biography</h3>
                    <p class="people-bio text-gray-500 text-sm leading-relaxed">{{$people['biography'] ? $people['biography'] : 'No Biography.'}}</p>
                </div>
                <div class="social-links flex flex-row mt-8 px-2">
                    @if ($facebook == 'https://www.facebook.com/')
                        <svg class="fill-current text-gray-400 cursor-not-allowed w-6 mr-3" viewBox="0 0 448 512"><path d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"/></svg>
                    @else 
                        <a href="{{$facebook}}" target="_blank">
                            <svg class="fill-current hover:text-blue-800 w-6 mr-3" viewBox="0 0 448 512"><path d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"/></svg>
                        </a>
                    @endif

                    @if ($twitter == 'https://twitter.com/')
                        <svg class="fill-current text-gray-400 cursor-not-allowed w-6 mr-3" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                    @else 
                        <a href="{{$twitter}}" target="_blank">
                            <svg class="fill-current hover:text-blue-400 w-6 mr-3" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                        </a>
                    @endif

                    @if ($instagram == 'https://www.instagram.com/')
                        <svg class="fill-current text-gray-400 cursor-not-allowed w-6 mr-3" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                    @else 
                        <a href="{{$instagram}}" target="_blank">
                            <svg class="fill-current hover:text-red-500 w-6 mr-3" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                        </a>
                    @endif

                    @if (!empty($people['homepage']))
                        <a href="{{$people['homepage']}}" target="_blank">
                            <svg class="fill-current w-6" viewBox="0 0 20 20" fill="currentColor" class="home w-6 h-6"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        </a>
                    @endif
                </div>
                <div class="personal mt-8 px-2">
                    <h1 class="text-lg font-bold mt-12 mb-4">Personal Info</h1>
                    <div>
                        <h2 class="text-sm font-semibold">Known For</h2>
                        <h5 class="text-gray-500 text-sm mt-1">{{$people['known_for_department']}}</h5>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold mt-6">Known Credits</h2>
                        <h5 class="text-gray-500 text-sm mt-1">{{$creditCount}}</h5>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold mt-6">Gender</h2>
                        <h5 class="text-gray-500 text-sm mt-1">{{$gender}}</h5>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold mt-6">Birthday</h2>
                        <h5 class="text-gray-500 text-sm mt-1">{{$birthday}}</h5>
                    </div>
                    @if ($people['deathday'])
                        <div>
                            <h2 class="text-sm font-semibold mt-6">Died</h2>
                            <h5 class="text-gray-500 text-sm mt-1">{{$deathday}}</h5>
                        </div>
                    @endif
                    <div>
                        <h2 class="text-sm font-semibold mt-6">Birth Place</h2>
                        <h5 class="text-gray-500 text-sm mt-1">{{$birthPlace}}</h5>
                    </div>
                </div>
            </div>
            <div class="md:col-span-3 p-2">
                <div class="hidden md:block">
                    <h1 class="text-3xl font-bold">{{$people['name']}}</h1>
                    @if (isset($people['birthday']))
                        <p class="text-gray-500 text-sm mt-2">{{$age}} years old</p>
                    @endif
                    <h3 class="text-lg font-bold mt-12 mb-4">Biography</h3>
                    <p class="people-bio text-gray-500 text-sm leading-relaxed">{{$people['biography'] ? $people['biography'] : 'No Biography.'}}</p>
                </div>
                <div class="known-for">
                    <h1 class="text-xl font-bold mt-8">Known For</h1>
                    <div class="flex flex-row overflow-x-scroll mt-2 pb-4">
                        @foreach ($knownFor as $item)
                            <div class="index-movie-card mr-4">
                                <a href="{{route('movies.show', $item['id'])}}">
                                    <img src="{{ $item['poster_path'] ? 
                                            'https://image.tmdb.org/t/p/w300/' . $item['poster_path'] : 
                                            '/img/No-Profile-Pic.svg' }}" 
                                        alt="cast member" class="cast-profile-img rounded-lg shadow-lg
                                                                {{$item['poster_path'] ? '' : 'bg-gray-100'}}">
                                </a>
                                <div class="mt-2">
                                    <h3 class="text-sm text-center">{{$item['title']}}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="acting">
                    <h1 class="text-xl font-bold mt-8 mb-4">Acting</h1>
                    <table class="table-auto text-primary-blue-dark text-sm w-full shadow-lg">
                        <tbody>
                            @foreach ($acting as $item)
                                <tr>
                                    <td class="border tiny-text md:text-xs px-4 py-2 bg-gray-100">
                                        <div class="px-2">
                                            <span class="mr-6">{{$item['creditsYear']}}</span>
                                            <a href="{{ isset($item['title']) ? route('movies.show', $item['id']) : route('tv.show', $item['id']) }}"
                                            class="font-semibold">
                                                {{Str::limit($item['creditsTitle'], 40)}}
                                            </a>
                                            <span class="text-gray-500 font-light hidden md:inline-block">as</span>
                                            <span class="hidden md:inline-block">{{$item['character']}}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="production">
                    <h1 class="text-xl font-bold mt-8 mb-4">Production</h1>
                    <table class="table-auto text-primary-blue-dark text-sm w-full shadow-lg">
                        <tbody>
                            @foreach ($production as $item)
                                <tr>
                                    <td class="border tiny-text md:text-xs px-4 py-2 bg-gray-100">
                                        <div class="px-2">
                                            <span class="mr-6">{{$item['creditsYear']}}</span>
                                            <a href="{{ isset($item['title']) ? route('movies.show', $item['id']) : route('tv.show', $item['id']) }}"
                                            class="font-semibold">
                                                {{$item['creditsTitle']}}
                                            </a>
                                            <span class="text-gray-500 font-light hidden md:inline-block">as</span>
                                            <span class="hidden md:inline-block">{{$item['job']}}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-footer/>
    
@endsection