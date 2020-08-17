@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9">
        <div class="flex flex-row my-12">
            <div class="poster mr-12" style="min-width: 300px">
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
                <div class="flex items-center mt-6">
                    <div class="bg-primary-red text-white font-bold border-4 
                                border-primary-blue-dark py-2 px-3 rounded-full font-righteous">{{$vote}}%</div>
                    <div class="ml-2 font-semibold text-sm">User <br>Score</div>
                </div>
                <div class="overview text-gray-500 mt-8">
                    <h2 class="italic mb-4">{{$movie['tagline'] ?? ''}}</h2>
                    <h2 class="text-black font-bold text-lg mb-2 mt-8">Overview</h2>
                    <p class="mt-2">{{$movie['overview']}}</p>
                </div>
                <div class="crew text-gray-500 mt-8">
                    <h2 class="mb-2 text-black text-lg font-bold">Crew</h2>
                    <div class="flex">
                        @foreach ($selectCrew as $crew)
                            <div class="{{$loop->first ? '' : 'ml-6'}}">
                                <h5 class="font-bold text-sm mb-1">{{$crew['name']}}</h5>
                                <span>{{$crew['job']}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection