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
    public function topRated($page = 1)
    {
        abort_if($page > 500, 204);

        $topRated = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/tv/top_rated?page=' . $page)
                            ->json()['results'];

        return view('tv.top-rated', [
            'topRated' => $topRated,
        ]);
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
                            ->get('https://api.themoviedb.org/3/tv/' . $id . '?append_to_response=credits,content_ratings,videos,images,external_ids,keywords')
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
        $creator = collect($tvShow['created_by'])->take(3);

        // Cast
        $cast = collect($tvShow['credits']['cast']);

        // Keywords
        $keywords = $tvShow['keywords']['results'] ? 
            collect($tvShow['keywords']['results'])->take(15) :
            'No Keywords';

        // Status
        $status = $tvShow['status'];

        // Latest episode air
        $latestAir = Carbon::parse($tvShow['last_air_date'])->format('m/d/Y');

        // Social Links
        $facebook = 'https://www.facebook.com/' . $tvShow['external_ids']['facebook_id'];
        $twitter = 'https://twitter.com/' . $tvShow['external_ids']['twitter_id'];
        $instagram = 'https://www.instagram.com/' . $tvShow['external_ids']['instagram_id'];
        
        // dump($tvShow);

        return view('tv.show', [
            'tvShow' => $tvShow,
            'releaseYear' => $releaseYear,
            'rating' => $rating,
            'firstAir' => $firstAir,
            'genres' => $genres,
            'runTime' => $runTime,
            'vote' => $vote,
            'creator' => $creator,
            'cast' => $cast,
            'keywords' => $keywords,
            'status' => $status,
            'latestAir' => $latestAir,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
        ]);
    }
}
