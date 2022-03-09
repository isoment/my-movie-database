@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9 my-8">

        <div class="my-12">
            <div class="flex items-center mb-8">
                <h1 class="text-2xl font-bold mr-2 md:mr-4">Favorite Movies</h1>
                <a href="{{route('home')}}" class="flex items-center bg-primary-blue-med font-bold text-sm rounded-full pl-4 py-1 pr-3">
                    <span class="mr-1 red-gradient">Back</span>
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

        {{ $favoritesMovies->links() }}

    </div>
@endsection
