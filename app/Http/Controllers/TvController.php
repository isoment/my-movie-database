<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
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
        $tvShow = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/tv/' . $id . '?append_to_response=credits,content_ratings,videos,images')
                            ->json();

        // Release Year
        $releaseYear = Carbon::parse($tvShow['first_air_date'])->format('Y');

        // Rating
        $rating = collect($tvShow['content_ratings']['results'])
                        ->where('iso_3166_1', 'US')->first();
        if (!empty($rating)) {
            $rating = $rating['rating'];
        } else {
            $rating = 'NR';
        }

        // First Air
        $firstAir = Carbon::parse($tvShow['first_air_date'])->format('m/d/Y');

        // Genres
        $genres = collect($tvShow['genres'])->pluck('name')->implode(', ');

        // Runtime
        $runTime = collect($tvShow['episode_run_time'])->first();

        // Vote Percentage
        $vote = $tvShow['vote_average'] * 10;

        // Created By
        $creator = $tvShow['created_by'];

        dump($runTime);
        dump($tvShow);

        return view('tv.show', [
            'tvShow' => $tvShow,
            'releaseYear' => $releaseYear,
            'rating' => $rating,
            'firstAir' => $firstAir,
            'genres' => $genres,
            'runTime' => $runTime,
            'vote' => $vote,
            'creator' => $creator,
        ]);
    }
}