@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9">
        <div class="flex flex-col md:flex-row my-12">
            <div class="poster mr-12">
                <img src="https://image.tmdb.org/t/p/w300/{{$tvShow['poster_path']}}" 
                     alt="poster" class="rounded-lg">
            </div>
            <div class="details">
                <h1 class="text-3xl font-bold">{{$tvShow['name']}} ({{$releaseYear}})</h1>
                <div class="flex items-center mt-2 text-sm text-gray-500">
                    <div class="text-primary-red font-semibold border 
                                border-gray-500 p-1 mr-2 rounded-md">Rated: {{$rating}}</div>
                    <div>{{$firstAir}}</div>
                    <div class="px-2 text-3xl">&#183;</div>
                    <div>{{$genres}}</div>
                    <div class="px-2 text-3xl">&#183;</div>
                    <div>{{$runTime}} min</div>
                </div>
                <div class="flex items-center mt-6">
                    <div class="bg-primary-red text-white font-bold border-4 
                                border-primary-blue-dark py-2 px-3 rounded-full font-righteous">{{$vote}}%</div>
                    <div class="ml-2 font-semibold text-sm">User <br>Score</div>
                </div>
                <div class="overview text-gray-500 mt-8">
                    <h2 class="italic mb-4">Tagline</h2>
                    <h2 class="text-black font-bold text-lg mb-2 mt-8">Overview</h2>
                    <p class="mt-2">{{$tvShow['overview']}}</p>
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
    </div>
@endsection