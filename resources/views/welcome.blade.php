@extends('layouts.app')

@section('content')
    <div class="xl:container xl:mx-auto">

        <section class="intro">
            <div class="px-4 lg:px-10 py-12 lg:pt-24 lg:pb-24">
                <div class="text-white">
                    <h2 class="text-5xl font-extrabold">Welcome.</h2>
                    <h3 class="text-2xl font-semibold mt-2">Explore millions of movies, TV shows and people. Right now.</h3>
                </div>
                <div class="mt-12">
                    <form action="" class="flex flex-row">
                        <input type="text" 
                               class="px-6 py-3 w-full rounded-l-full focus:outline-none"
                               placeholder="Search...">
                        <input type="submit" value="Search" 
                               class="py-3 px-8 -ml-5 rounded-full bg-primary-red text-white 
                                      text-sm font-bold focus:outline-none hover:text-primary-blue-med cursor-pointer 
                                      transition ease-in-out duration-300">
                    </form>
                </div>
            </div>
        </section>

        <section class="popular-movies">
            <div class="popular-movies-content mt-8 px-10">
                <h2 class="text-2xl font-semibold font-mulish">Popular Movies</h2>
                {{-- <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-8 mt-6"> --}}

                <div class="flex overflow-x-scroll mt-6 pb-12">

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div>
                    
                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div> 

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Title</h5>
                        <h5 class="font-light mt-1">Release Date</h5>
                    </div>

                </div>
            </div>
        </section>

        <section class="popular-tv mt-8 lg:mt-24">
            <div class="popular-tv-content mt-8 px-10">
                <h2 class="text-2xl font-semibold font-mulish">Popular TV Shows</h2>
                {{-- <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-8 mt-6"> --}}

                <div class="flex overflow-x-scroll mt-6 pb-12">

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <h5 class="font-semibold mt-4">Name</h5>
                        <h5 class="font-light mt-1">Air Date</h5>
                    </div>

            </div>
        </section>

    </div>
@endsection


