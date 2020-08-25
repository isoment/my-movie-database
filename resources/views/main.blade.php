@extends('layouts.app')

@section('content')
    <div class="xl:container xl:mx-auto">

        <section class="intro">
            <div class="px-4 lg:px-10 py-12 lg:pt-24 lg:pb-24">
                <div class="text-white">
                    <h2 class="text-4xl font-extrabold">Welcome.</h2>
                    <h3 class="text-2xl font-semibold mt-2">Explore millions of movies, TV shows and people. Right here.</h3>
                </div>
                <div class="mt-12">
                    <form action="" class="flex flex-row">
                        <input type="text" 
                               class="px-6 py-3 w-full rounded-l-full focus:outline-none text-gray-500"
                               placeholder="Search...">
                        <input type="submit" value="Search" 
                               class="py-3 px-8 -ml-5 rounded-full bg-primary-red text-white 
                                      text-sm font-bold focus:outline-none hover:text-primary-blue-dark cursor-pointer 
                                      transition ease-in-out duration-300">
                    </form>
                </div>
            </div>
        </section>

        <section class="popular-movies">
            <div class="popular-movies-content mt-8 px-10">
                <div class="font-mulish flex items-center">
                    <h2 class="text-2xl font-semibold mr-4">Popular Movies</h2>
                    <a href="#" class="flex items-center bg-primary-blue-med font-bold text-sm rounded-full pl-4 pr-3">
                        <span class="mr-1 red-gradient">Top Rated</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down chevron-more h-5 text-primary-red"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                <div class="flex overflow-x-scroll mt-6 pb-4">
                    @foreach ($popularMovies as $movie)
                        {{-- Card --}}
                        <div class="index-movie-card w-40 mr-4">
                            <a href="{{route('movies.show', $movie['id'])}}">
                                <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="poster"
                                    class="rounded-lg">
                            </a>
                            <div class="relative">
                                <div class="badge text-xs absolute bg-white text-primary-red 
                                            rounded-full py-1 px-2 border-2 border-primary-red
                                            top-0 -mt-7 right-0 mr-2">
                                    <span class="font-semibold">{{$movie['vote_average'] * 10}}%</span>
                                </div>
                                <h5 class="font-semibold text-sm mt-4">{{$movie['title']}}</h5>
                                <h5 class="font-light text-xs text-gray-500 mt-1">{{\Carbon\Carbon::parse($movie['release_date'])->format('M, d Y')}}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="popular-tv mt-8 lg:mt-12">
            <div class="popular-tv-content mt-8 px-10">
                <div class="font-mulish flex items-center">
                    <h2 class="text-2xl font-semibold mr-4">Popular TV</h2>
                    <a href="#" class="flex items-center bg-primary-blue-med font-bold text-sm rounded-full pl-4 pr-3">
                        <span class="mr-1 text-primary-red">Top Rated</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down chevron-more h-5 text-primary-red"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                <div class="flex overflow-x-scroll mt-6 pb-4">
                    @foreach ($popularTV as $show)
                        {{-- Card --}}
                        <div class="index-movie-card w-40 mr-4">
                            <a href="{{route('tv.show', $show['id'])}}">
                                <img src="https://image.tmdb.org/t/p/w500/{{$show['poster_path']}}" alt="poster"
                                    class="rounded-lg">
                            </a>
                            <div class="relative">
                                <div class="badge text-xs absolute bg-white text-primary-red 
                                            rounded-full py-1 px-2 border-2 border-primary-red
                                            top-0 -mt-7 right-0 mr-2">
                                    <span class="font-semibold">{{$show['vote_average'] * 10}}%</span>
                                </div>
                                <h5 class="font-semibold text-sm mt-4">{{$show['name']}}</h5>
                                <h5 class="font-light text-xs text-gray-500 mt-1">{{\Carbon\Carbon::parse($show['first_air_date'])->format('M, d Y')}}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="trending mt-8 mb-8 lg:mt-12">
            <div class="trending-content mt-8 px-10">
                <div class="font-mulish">
                    <h2 class="text-2xl font-semibold mr-4">Trending</h2>
                </div>
                <div class="flex overflow-x-scroll mt-6 pb-4">
                    @foreach ($trending as $trending)
                        {{-- Card --}}
                        <div class="index-movie-card w-40 mr-4">
                            <a href="{{isset($trending['title']) ? route('movies.show', $trending['id']) : route('tv.show', $trending['id'])}}">
                                <img src="https://image.tmdb.org/t/p/w500/{{$trending['poster_path']}}" alt="poster"
                                    class="rounded-lg">
                            </a>
                            <div class="relative">
                                <div class="badge text-xs absolute bg-white text-primary-red 
                                            rounded-full py-1 px-2 border-2 border-primary-red
                                            top-0 -mt-7 right-0 mr-2">
                                    <span class="font-semibold">{{$trending['vote_average'] * 10}}%</span>
                                </div>
                                <h5 class="font-semibold text-sm mt-4">
                                    {{ isset($trending['name']) ? $trending['name'] : $trending['title']}}
                                </h5>
                                <h5 class="font-light text-xs text-gray-500 mt-1">
                                    {{ \Carbon\Carbon::parse(isset($trending['first_air_date']) ? $trending['first_air_date'] : $trending['release_date'])->format('M, d Y') }}
                                </h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
@endsection


