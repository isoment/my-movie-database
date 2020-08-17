<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,release_dates,videos,images')
                            ->json();

        // Release Year
        $releaseYear = Carbon::parse($movie['release_date'])->format('Y');

        // MPAA Rating
        $rating = collect($movie['release_dates']['results'])
                        ->where('iso_3166_1', 'US')->first();
        if (!empty($rating['release_dates'][0]['certification'])) {
            $rating = $rating['release_dates'][0]['certification'];
        } else {
            $rating = 'NR';
        }

        // Release Date
        $releaseDate = Carbon::parse($movie['release_date'])->format('m/d/Y');
        
        // Genres
        $genres = collect($movie['genres'])->pluck('name')->implode(', ');

        $runTime = date('G\h i\m', mktime(0, $movie['runtime']));

        // Dumps
        dump($runTime);
        dump($movie);

        return view('movies.show', [
            'movie' => $movie,
            'releaseYear' => $releaseYear,
            'rating' => $rating,
            'releaseDate' => $releaseDate,
            'genres' => $genres,
            'runTime' => $runTime,
        ]);
    }
}
