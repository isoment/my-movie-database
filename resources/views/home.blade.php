@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9 my-8">

        <div class="my-12">
            <div class="flex items-center mb-8">
                <h1 class="text-2xl font-bold mr-2 md:mr-4">Favorite Movies</h1>
                <a href="{{ route('favorite.movies') }}" class="flex items-center bg-primary-blue-med font-bold text-sm rounded-full pl-4 pr-3">
                    <span class="mr-1 red-gradient">More</span>
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down chevron-more h-5 text-primary-red"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-10">
                @foreach ($favoritesMovies as $favorite)
                    {{-- Card --}}
                    <div class="movie top-rated-card mr-4 relative">
                        <a href="{{route('movies.show', $favorite['media_id'])}}">
                            <img src="{{$favorite['poster_path'] ?
                                        'https://image.tmdb.org/t/p/w500/' . $favorite['poster_path'] :
                                        '/img/No-Poster-Top.png' }}" alt="poster"
                                class="rounded-lg shadow-lg favorites-index-poster {{$favorite['poster_path'] ? '' : 'bg-gray-100'}}">
                        </a>
                        <div>
                            <h5 class="font-semibold text-sm mt-4">{{$favorite['title']}}</h5>
                            <h5 class="font-light text-xs text-gray-500 mt-1">{{ $favorite['release_date'] }}</h5>
                        </div>
                        <div class="badge text-xs absolute bg-white text-primary-red 
                                    rounded-full px-1 sm:px-2 sm:py-1 border-2 border-primary-red
                                    top-5 -mt-7 lg:right-2 mr-2">
                            <form action="{{ route('favorite.movie.delete', $favorite['media_id']) }}"
                                    method="POST">
                                @csrf
                                @method('DELETE')
                                <span title="Delete">
                                    <button type="submit" class="focus:outline-none">
                                        Delete
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="my-12">
            <div class="flex items-center mb-8">
                <h1 class="text-2xl font-bold mr-2 md:mr-4">Favorite Shows</h1>
                <a href="{{ route('favorite.tv') }}" class="flex items-center bg-primary-blue-med font-bold text-sm rounded-full pl-4 pr-3">
                    <span class="mr-1 red-gradient">More</span>
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down chevron-more h-5 text-primary-red"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-10">
                @foreach ($favoritesTV as $favorite)
                    {{-- Card --}}
                    <div class="movie top-rated-card mr-4 relative">
                        <a href="{{route('tv.show', $favorite['media_id'])}}">
                            <img src="{{$favorite['poster_path'] ?
                                        'https://image.tmdb.org/t/p/w500/' . $favorite['poster_path'] :
                                        '/img/No-Poster-Top.png' }}" alt="poster"
                                class="rounded-lg shadow-lg favorites-index-poster {{$favorite['poster_path'] ? '' : 'bg-gray-100'}}">
                        </a>
                        <div>
                            <h5 class="font-semibold text-sm mt-4">{{$favorite['title']}}</h5>
                            <h5 class="font-light text-xs text-gray-500 mt-1">{{ $favorite['release_date'] }}</h5>
                        </div>
                        <div class="badge text-xs absolute bg-white text-primary-red 
                                    rounded-full px-1 sm:px-2 sm:py-1 border-2 border-primary-red
                                    top-5 -mt-7 lg:right-2 mr-2">
                            <form action="{{ route('favorite.tv.delete', $favorite['media_id']) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <span title="Delete">
                                    <button type="submit" class="focus:outline-none">
                                        Delete
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
