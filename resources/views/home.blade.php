@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9 my-8">

        <div class="my-12">
            <h1 class="text-2xl font-bold mb-8">Favorite Movies</h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-10">
                @foreach ($favoritesMovies as $favorite)
                    @can('view', $favorite)
                        {{-- Card --}}
                        <div class="movie top-rated-card mr-4">
                            <a href="{{route('movies.show', $favorite['media_id'])}}">
                                <img src="{{$favorite['poster_path'] ?
                                            'https://image.tmdb.org/t/p/w500/' . $favorite['poster_path'] :
                                            '/img/No-Poster-Top.png' }}" alt="poster"
                                    class="rounded-lg shadow-lg popular-profile {{$favorite['poster_path'] ? '' : 'bg-gray-100'}}">
                            </a>
                            <div class="relative">
                                <h5 class="font-semibold text-sm mt-4">{{$favorite['title']}}</h5>
                                <h5 class="font-light text-xs text-gray-500 mt-1">{{ $favorite['release_date'] }}</h5>
                            </div>
                        </div>
                    @endcan
                @endforeach
            </div>
        </div>

        <div class="my-12">
            <h1 class="text-2xl font-bold mb-8">Favorite Shows</h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-10">
                @foreach ($favoritesTV as $favorite)
                    @can('view', $favorite)
                        {{-- Card --}}
                        <div class="movie top-rated-card mr-4">
                            <a href="{{route('tv.show', $favorite['media_id'])}}">
                                <img src="{{$favorite['poster_path'] ?
                                            'https://image.tmdb.org/t/p/w500/' . $favorite['poster_path'] :
                                            '/img/No-Poster-Top.png' }}" alt="poster"
                                    class="rounded-lg shadow-lg popular-profile {{$favorite['poster_path'] ? '' : 'bg-gray-100'}}">
                            </a>
                            <div class="relative">
                                <h5 class="font-semibold text-sm mt-4">{{$favorite['title']}}</h5>
                                <h5 class="font-light text-xs text-gray-500 mt-1">{{ $favorite['release_date'] }}</h5>
                            </div>
                        </div>
                    @endcan
                @endforeach
            </div>
        </div>

    </div>
@endsection
