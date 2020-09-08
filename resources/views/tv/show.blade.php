@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9">

        <x-messages/>

        <div class="flex flex-col md:flex-row my-12">
            <div class="poster md:mr-12 {{ $tvShow['poster_path'] ? '' : 'bg-gray-100' }}">
                <img src="{{ $tvShow['poster_path'] ? 'https://image.tmdb.org/t/p/w300/' . $tvShow['poster_path'] : '/img/No-Poster.svg' }}" 
                     alt="poster" class="rounded-lg text-center">
            </div>
            <div class="details">
                <h1 class="text-lg lg:text-3xl font-bold mt-6 lg:mt-0">{{$tvShow['name']}} ({{$releaseYear}})</h1>
                <div class="flex flex-col lg:flex-row lg:items-center mt-2 text-sm text-gray-500">
                    <div class="text-primary-red font-semibold lg:border text-xs flex-none lg:w-auto lg:text-base
                                border-gray-500 py-1 lg:px-2 mr-2 rounded-md mb-1 lg:mb-0">Rated: {{$rating}}</div>
                    <div class="mb-1 lg:mb-0">{{$firstAir}}</div>
                    <div class="px-2 text-3xl hidden lg:inline-block">&#183;</div>
                    <div class="mb-1 lg:mb-0">{{$genres}}</div>
                    <div class="px-2 text-3xl hidden lg:inline-block">&#183;</div>
                    <div>{{$runTime}} min</div>
                </div>
                <div class="flex flex-row items-center">
                    <div class="flex items-center mt-6">
                        <div class="bg-primary-red text-white font-bold border-4 
                                    border-primary-blue-dark py-2 px-3 rounded-full font-righteous">{{$vote}}%</div>
                        <div class="ml-2 font-semibold text-sm">User <br>Score</div>
                    </div>
                    @auth
                        <div class="mt-6 ml-4">
                            <form action="{{route('favorite.tv.add', $tvShow['id'])}}" method="POST" class="mb-0">
                                @csrf
                                <input type="hidden" name="title" value="{{$tvShow['name']}}">
                                <input type="hidden" name="first_air_date" value="{{\Carbon\Carbon::parse($firstAir)->format('M, d Y')}}">
                                <input type="hidden" name="poster_path" value="{{$tvShow['poster_path']}}">
                                <span title="Favorite">
                                    <button type="submit" class="focus:outline-none">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="star w-8 h-8 text-primary-gold"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    </button>
                                </span>
                            </form>
                        </div>
                    @endauth
                </div>

                <div class="overview text-gray-500 mt-8">
                    <h2 class="text-black font-bold text-lg mb-2 mt-8">Overview</h2>
                    <p class="mt-2 leading-relaxed">{{$tvShow['overview']}}</p>
                </div>
                <div class="crew text-gray-500 mt-8">
                    <div class="grid grid-cols-1 md:grid-cols-3">
                        @foreach ($creator as $creator)
                            <div class="{{$loop->last ? '' : 'mr-20'}} mt-2 mb-4">
                                <h5 class="font-bold text-sm mb-1">{{$creator['name']}}</h5>
                                <span class="text-xs">Creator</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h1 class="text-2xl font-bold">Cast</h1>
            <div class="flex flex-row overflow-x-scroll mt-6 pb-4">
                @foreach ($cast as $cast)
                    <div class="index-movie-card mr-4">
                        <a href="{{route('people.show', $cast['id'])}}">
                            <img src="{{ $cast['profile_path'] ? 
                                     'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] : 
                                     '/img/No-Profile-Pic.svg' }}" 
                                alt="cast member" class="cast-profile-img rounded-lg shadow-lg
                                                        {{$cast['profile_path'] ? '' : 'bg-gray-100'}}">
                        </a>
                        <div class="mt-5">
                            <h3 class="font-semibold text-sm">{{$cast['name']}}</h3>
                            <h5 class="font-light text-xs text-gray-500 mt-1">{{$cast['character']}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-4 lg:mt-12 mb-12">
            <div class="flex flex-col md:flex-row lg:mt-6 justify-around">
                <div class="flex flex-col">
                    <div class="flex order-2 flex-row items-center mb-2 lg:mb-0 lg:mt-4">
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
                            <svg class="fill-current text-gray-400 cursor-not-allowed w-6" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                        @else 
                            <a href="{{$instagram}}" target="_blank">
                                <svg class="fill-current hover:text-red-500 w-6" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                            </a>
                        @endif
                    </div>
                    <div class="details flex justify-between flex-col">
                        <div class="flex flex-col lg:mt-4 mb-3">
                            <div class="mb-1 font-semibold">Status</div> 
                            <div class="text-gray-500 text-sm">{{$status}}</div> 
                        </div>
                        <div class="flex flex-col mb-3">
                            <div class="mb-1 font-semibold">Type</div> 
                            <div class="text-gray-500 text-sm">{{$tvShow['type']}}</div> 
                        </div>
                        <div class="flex flex-col mb-3">
                            <div class="mb-1 font-semibold">Latest Episode Air</div> 
                            <div class="text-gray-500 text-sm">{{$latestAir}}</div> 
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full mt-6 lg:mt-0 lg:w-6/12 mx-0 md:mx-10 lg:mx-0">
                    <h1 class="text-xl font-bold">Keywords</h1>
                    <div class="keywords flex flex-wrap mb-4 mt-2 lg:mt-4">
                        @if ($keywords != 'No Keywords')
                            @foreach ($keywords as $keyword)
                                <span class="border border-gray-300 bg-gray-300 py-2 
                                            px-3 mr-2 mt-2 rounded-sm text-xs text-primary-blue-dark">{{$keyword['name']}}</span>
                            @endforeach
                        @else 
                        <span class="border border-gray-300 bg-gray-300 py-2 
                        px-3 mr-2 mt-2 rounded-sm text-xs text-primary-blue-dark">{{$keywords}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-footer/>
    
@endsection