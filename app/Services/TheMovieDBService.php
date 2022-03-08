<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TheMovieDBService
{
    /**
     *  An index of popular movies
     *  
     *  @return array
     */
    public function popularMovies() : array
    {
        return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];
    }

    /**
     *  An index of popular TV shows
     * 
     *  @return array
     */
    public function popularTV() : array
    {
        return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular')
            ->json()['results'];
    }

    /**
     *  An index of this weeks trending movies and tv
     * 
     *  @return array
     */
    public function thisWeekTrending() : array
    {
        return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movietv/week')
            ->json()['results'];
    }
}