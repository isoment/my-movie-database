@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-9">

        <div class="my-12">
            <h1 class="text-3xl font-bold mb-8">Top Rated Movies</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
                @foreach ($topRated as $movie)
                    {{-- Card --}}
                    <div class="movie top-rated-card w-35 lg:w-60 mr-4">
                        <a href="{{route('movies.show', $movie['id'])}}">
                            <img src="{{$movie['poster_path'] ?
                                        'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] :
                                        '/img/No-Poster-Top.png' }}" alt="poster"
                                class="rounded-lg shadow-lg popular-profile {{$movie['poster_path'] ? '' : 'bg-gray-100'}}">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 md:py-2 px-2 md:px-3 border-2 border-primary-red
                                        top-0 -mt-7 md:-mt-9 right-0 mr-2 md:mr-3">
                                <span class="font-semibold">{{$movie['vote_average'] * 10}}%</span>
                            </div>
                            <h5 class="font-semibold text-sm mt-4">{{$movie['title']}}</h5>
                            <h5 class="font-light text-xs text-gray-500 mt-1">{{\Carbon\Carbon::parse($movie['release_date'])->format('M, d Y')}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="page-load-status">
            <p class="infinite-scroll-request text-center text-lg text-primary-red my-12">Loading...</p>
            <p class="infinite-scroll-last text-center text-lg text-primary-red my-12">End of content</p>
            <p class="infinite-scroll-error text-center text-lg text-primary-red my-12">No more pages to load</p>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll(elem, {
            path: '/movies/top-rated/@{{#}}',
            append: '.movie',
            history: false,
            status: '.page-load-status',
        });
    </script>
@endsection