@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9">

        <div class="my-12">
            <h1 class="text-3xl font-bold mb-8">Top Rated Movies</h1>
            <div class="grid grid-cols-4 gap-10">
                @foreach ($topRated as $movie)
                    {{-- Card --}}
                    <div class="top-rated-card w-60 mr-4">
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

    </div>
@endsection