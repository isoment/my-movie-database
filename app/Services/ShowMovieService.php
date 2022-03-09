<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\View\View;

class ShowMovieService extends TheMovieDBService
{
    public function __construct(private DataTransformService $dt)
    {}

    public function movie(int $id) : View
    {
        $movie = $this->showMovie($id);

        // Return 404 if doesn't exist
        abort_if(isset($movie['success']) && $movie['success'] === false, 404);

        return view('movies.show', [
            'movie' => $movie,
            'releaseYear' => $this->dt->formatAsYear($movie['release_date']),
            'rating' => $this->mpaaRating($movie['release_dates']['results']),
            'releaseDate' => $this->dt->formatAsSlashDate($movie['release_date']),
            'genres' => $this->dt->genres($movie['genres']),
            'runTime' => $this->runTime($movie['runtime']),
            'vote' => $this->dt->votePercentage($movie['vote_average']),
            'selectCrew' => $this->selectedCrew($movie['credits']['crew']),
            'producers' => $this->producers($movie['credits']['crew']),
            'cast' => $this->cast($movie['credits']['cast']),
            'keywords' => $this->dt->keywords($movie['keywords']['keywords']),
            'budget' => $this->monetaryFormat($movie['budget']),
            'revenue' => $this->monetaryFormat($movie['revenue']),
            'facebook' => 'https://www.facebook.com/' . $movie['external_ids']['facebook_id'],
            'twitter' => 'https://twitter.com/' . $movie['external_ids']['twitter_id'],
            'instagram' => 'https://www.instagram.com/' . $movie['external_ids']['instagram_id'],
            'userFavorite' => $this->dt->isUserFavorite($id, 'Movie')
        ]);
    }

    public function mpaaRating(array $releaseDateResults) : string
    {
        $rating = collect($releaseDateResults)
                        ->where('iso_3166_1', 'US')->first();

        if (!empty($rating['release_dates'][0]['certification'])) {
            return $rating['release_dates'][0]['certification'];
        }

        return 'NR';
    }

    public function runTime(int $time) : string
    {
        return date('G\h i\m', mktime(0, $time));
    }

    public function selectedCrew(array $crew) : Collection
    {
        return collect($crew)->filter(function($value) {
            return data_get($value, 'job') == "Director" || 
                   data_get($value, 'job') == "Writer";
        })->take(3);
    }

    public function producers(array $crew) : Collection
    {
        return collect($crew)->filter(function($value) {
            return data_get($value, 'job') == "Producer" || 
                   data_get($value, 'job') == "Executive Producer";
        })->take(3);
    }

    public function cast(array $cast) : Collection
    {
        return collect($cast)->take(10);
    }

    public function monetaryFormat(float $type) : string
    {
        return $type == 0 ? 'Not Available' : '$' . number_format($type);
    }
}