<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use NumberFormatter;

class MoviesController extends Controller
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
                            ->get('https://api.themoviedb.org/3/movie/top_rated?page=' . $page)
                            ->json()['results'];

        // dump($topRated);

        return view('movies.top-rated', [
            'topRated' => $topRated,
        ]);
    }

    /**
     * Display the individual movie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=external_ids,keywords,credits,release_dates,videos,images')
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

        // Runtime in hours and min
        $runTime = date('G\h i\m', mktime(0, $movie['runtime']));

        // Vote Percentage
        $vote = $movie['vote_average'] * 10;

        // Selected Crew
        $selectCrew = collect($movie['credits']['crew'])->filter(function($value) {
            return data_get($value, 'job') == "Director" || 
                   data_get($value, 'job') == "Writer";
        })->take(3);

        // Producers
        $producers = collect($movie['credits']['crew'])->filter(function($value) {
            return data_get($value, 'job') == "Producer" || 
                   data_get($value, 'job') == "Executive Producer";
        })->take(3);

        // Cast
        $cast = collect($movie['credits']['cast'])->take(10);

        // Keywords
        $keywords = $movie['keywords']['keywords'] ? 
                    collect($movie['keywords']['keywords'])->take(15) :
                    'No Keywords';

        // Determine budget and revenue
        function monetary($type) {
            if ($type == 0) {
                return 'Not Available';
            } else {
                return '$' . number_format($type);
            } 
        }
        $budget = monetary($movie['budget']);
        $revenue = monetary($movie['revenue']);

        // Social Links
        $facebook = 'https://www.facebook.com/' . $movie['external_ids']['facebook_id'];
        $twitter = 'https://twitter.com/' . $movie['external_ids']['twitter_id'];
        $instagram = 'https://www.instagram.com/' . $movie['external_ids']['instagram_id'];

        // Dumps
        dump($movie);

        return view('movies.show', [
            'movie' => $movie,
            'releaseYear' => $releaseYear,
            'rating' => $rating,
            'releaseDate' => $releaseDate,
            'genres' => $genres,
            'runTime' => $runTime,
            'vote' => $vote,
            'selectCrew' => $selectCrew,
            'producers' => $producers,
            'cast' => $cast,
            'keywords' => $keywords,
            'budget' => $budget,
            'revenue' => $revenue,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
        ]);
    }

}
