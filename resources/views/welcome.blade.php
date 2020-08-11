@extends('layouts.app')

@section('content')
    <div class="xl:container xl:mx-auto">

        <section class="intro">
            <div class="px-10 pt-24 pb-24">
                <div class="text-white">
                    <h2 class="text-5xl font-extrabold">Welcome.</h2>
                    <h3 class="text-2xl font-semibold mt-2">Explore millions of movies, TV shows and people. Right now.</h3>
                </div>
                <div class="mt-12">
                    <form action="" class="flex flex-row">
                        <input type="text" 
                               class="px-6 py-3 w-full rounded-l-full focus:outline-none"
                               placeholder="Search for a movie, tv show, person...">
                        <input type="submit" value="Search" 
                               class="py-3 px-8 -ml-5 rounded-full bg-primary-red text-white 
                                      text-sm font-bold focus:outline-none">
                    </form>
                </div>
            </div>
        </section>

        <section class="popular-media">
            <div class="popular-media-content mt-8 px-10">
                <h2 class="text-2xl font-semibold font-mulish">Popular Now</h2>
            </div>
        </section>

    </div>
@endsection


