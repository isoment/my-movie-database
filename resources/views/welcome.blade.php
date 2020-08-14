@extends('layouts.app')

@section('content')
    <div class="xl:container xl:mx-auto">

        <section class="intro">
            <div class="px-4 lg:px-10 py-12 lg:pt-24 lg:pb-24">
                <div class="text-white">
                    <h2 class="text-5xl font-extrabold">Welcome.</h2>
                    <h3 class="text-2xl font-semibold mt-2">Explore millions of movies, TV shows and people. Right here.</h3>
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
                <div class="font-mulish flex items-center">
                    <h2 class="text-2xl font-semibold mr-4">Popular Movies</h2>
                    <a href="#" class="flex items-center bg-primary-blue-med font-bold text-sm rounded-full pl-4 pr-3">
                        <span class="mr-1 text-primary-red">More</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down chevron-more h-5 text-primary-red"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                
                <div class="flex overflow-x-scroll mt-6 pb-12">

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>
                    
                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/Movie-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="popular-tv mt-8 lg:mt-24">
            <div class="popular-tv-content mt-8 px-10">
                <div class="font-mulish flex items-center">
                    <h2 class="text-2xl font-semibold mr-4">Popular TV</h2>
                    <a href="#" class="flex items-center bg-primary-blue-med font-bold text-sm rounded-full pl-4 pr-3">
                        <span class="mr-1 text-primary-red">More</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down chevron-more h-5 text-primary-red"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>

                <div class="flex overflow-x-scroll mt-6 pb-12">

                    {{-- Card --}}
                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>

                    <div class="index-movie-card w-40 mr-4">
                        <a href="#">
                            <img src="/img/TV-Poster.jpg" alt="poster"
                                 class="rounded-lg">
                        </a>
                        <div class="relative">
                            <div class="badge text-xs absolute bg-white text-primary-red 
                                        rounded-full py-1 px-2 border-2 border-primary-red
                                        top-0 -mt-7 right-0 mr-2">
                                <span class="font-semibold">73%</span>
                            </div>
                            <h5 class="font-semibold mt-4">Title</h5>
                            <h5 class="font-light mt-1">Release Date</h5>
                        </div>
                    </div>
                    

            </div>
        </section>

    </div>
@endsection


