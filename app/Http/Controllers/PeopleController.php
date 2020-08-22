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
        $people = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/person/' . $id . '?append_to_response=movie_credits,tv_credits,combined_credits,external_ids')
                            ->json();

        // Profile Photo
        $profilePhoto = 'https://image.tmdb.org/t/p/w300' . $people['profile_path'];

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

        // Get Credits for both movies and tv and sort be release date
        $credits = collect($people['combined_credits']['cast'])->map(function ($movie) {
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
                'character' => $movie['character'] ? $movie['character'] : 'Unknown',
            ]);
        })->whereNotIn('creditsReleaseDate', '')->sortByDesc('creditsReleaseDate');

        // Dumps
        dump($credits);
        dump($people);

        return view('people.show', [
            'people' => $people,
            'profilePhoto' => $profilePhoto,
            'knownFor' => $knownFor,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'gender' => $gender,
            'birthday' => $birthday,
            'deathday' => $deathday,
            'age' => $age,
            'birthPlace' => $birthPlace,
            'credits' => $credits,
        ]);
    }
}
