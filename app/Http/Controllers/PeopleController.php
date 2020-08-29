<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular($page = 1)
    {
        $popularPeople = Http::withToken(config('services.tmdb.token'))
                                ->get('https://api.themoviedb.org/3/person/popular?page=' . $page)
                                ->json()['results'];

        return view('people.popular', [
            'popularPeople' => $popularPeople,
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
        $people = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/person/' . $id . '?append_to_response=movie_credits,tv_credits,combined_credits,external_ids')
                            ->json();

        // Return 404 if doesnt exist
        abort_if(isset($people['success']) && $people['success'] == false, 404);

        // Known For
        $knownFor = collect($people['movie_credits']['cast'])
                        ->sortByDesc('popularity')->take(10);

        // Social Links
        $facebook = 'https://www.facebook.com/' . $people['external_ids']['facebook_id'];
        $twitter = 'https://twitter.com/' . $people['external_ids']['twitter_id'];
        $instagram = 'https://www.instagram.com/' . $people['external_ids']['instagram_id'];

        // Gender
        if ($people['gender'] === 1) {
            $gender = 'Female';
        } elseif ($people['gender'] === 2) {
            $gender = 'Male';
        } else {
            $gender = 'Other/Unknown';
        }

        // Birthday
        if ($people['birthday']) {
            $birthday = Carbon::parse($people['birthday'])->format('m/d/Y');
        } else {
            $birthday = 'Unknown';
        }
        
        $deathday = Carbon::parse($people['deathday'])->format('m/d/Y');

        // Age
        if ($people['deathday']) {
            $age = date_create($people['deathday'])->diff(date_create($people['birthday']))->y;
        } else {
            $age = date_create($people['birthday'])->diff(date_create('today'))->y;
        }

        // Birth Place
        $birthPlace = $people['place_of_birth'] ? $people['place_of_birth'] : 'Unknown';

        // Get acting credits for both movies and tv and sort be release date
        $acting = collect($people['combined_credits']['cast'])->map(function($movie) {
            if (isset($movie['release_date'])) {
                $creditsReleaseDate = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $creditsReleaseDate = $movie['first_air_date'];
            } else {
                $creditsReleaseDate = null;
            }

            if (isset($movie['title'])) {
                $creditsTitle = $movie['title'];
            } elseif (isset($movie['name'])) {
                $creditsTitle = $movie['name'];
            } else {
                $creditsTitle = 'Untitled';
            }

            return collect($movie)->merge([
                'creditsReleaseDate' => $creditsReleaseDate,
                'creditsYear' => Carbon::parse($creditsReleaseDate)->format('Y'),
                'creditsTitle' => $creditsTitle,
                'character' => !empty($movie['character']) ? $movie['character'] : 'Unknown',
            ]);
        })->whereNotIn('creditsReleaseDate', '')->sortByDesc('creditsReleaseDate');

        // Production credits
        $production = collect($people['combined_credits']['crew'])->map(function($item) {
            if (isset($item['release_date'])) {
                $creditsReleaseDate = $item['release_date'];
            } elseif (isset($item['first_air_date'])) {
                $creditsReleaseDate = $item['first_air_date'];
            } else {
                $creditsReleaseDate = null;
            }

            if (isset($item['title'])) {
                $creditsTitle = $item['title'];
            } elseif (isset($item['name'])) {
                $creditsTitle = $item['name'];
            } else {
                $creditsTitle = 'Untitled';
            }

            return collect($item)->merge([
                'creditsReleaseDate' => $creditsReleaseDate,
                'creditsYear' => Carbon::parse($creditsReleaseDate)->format('Y'),
                'creditsTitle' => $creditsTitle,
                'job' => $item['job'] ? $item['job'] : 'Unknown',
            ]);
        })->whereNotIn('creditsReleaseDate', '')->sortByDesc('creditsReleaseDate');

        // Credit Count
        $creditCount = $production->count() + $acting->count();

        dump($people);

        return view('people.show', [
            'people' => $people,
            'knownFor' => $knownFor,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'gender' => $gender,
            'birthday' => $birthday,
            'deathday' => $deathday,
            'age' => $age,
            'birthPlace' => $birthPlace,
            'acting' => $acting,
            'production' => $production,
            'creditCount' => $creditCount,
        ]);
    }
}
