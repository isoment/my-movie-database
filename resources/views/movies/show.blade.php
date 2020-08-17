@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9">
        <div class="flex flex-row my-12">
            <div class="poster mr-12">
                <img src="https://image.tmdb.org/t/p/w300/{{$movie['poster_path']}}" 
                     alt="poster" class="rounded-lg">
            </div>
            <div class="details">
                <h1 class="text-3xl font-bold">{{$movie['title']}} ({{$releaseYear}})</h1>
                <div class="flex items-center mt-2 text-sm text-gray-500">
                    <div class="text-primary-red font-semibold border 
                                border-gray-500 p-1 mr-2 rounded-md">Rated: {{$rating}}</div>
                    <div>{{$releaseDate}}</div>
                    <div class="px-2 text-3xl">&#183;</div>
                    <div>{{$genres}}</div>
                    <div class="px-2 text-3xl">&#183;</div>
                    <div>{{$movie['runtime']}} min</div>
                </div>
                <div class="overview text-gray-500 mt-8">
                    <h2 class="italic mb-4">"{{$movie['tagline'] ?? ''}}"</h2>
                    <h2 class="text-black font-bold text-lg mb-2">Overview</h2>
                    <p>{{$movie['overview']}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection