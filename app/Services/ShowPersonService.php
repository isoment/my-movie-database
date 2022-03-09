<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ShowPersonService extends TheMovieDBService
{
    public function __construct(private DataTransformService $dt) {}

    public function person(int $id) : View
    {
        $people = $this->showPerson($id);

        abort_if(isset($people['success']) && $people['success'] == false, 404);

        $castCredits = $this->creditsAsCast($people['combined_credits']['cast']);
        $crewCredits = $this->creditsAsProduction($people['combined_credits']['crew']);

        return view('people.show', [
            'people' => $people,
            'knownFor' => $this->knownFor($people['movie_credits']['cast']),
            'facebook' => 'https://www.facebook.com/' . $people['external_ids']['facebook_id'],
            'twitter' => 'https://twitter.com/' . $people['external_ids']['twitter_id'],
            'instagram' => 'https://www.instagram.com/' . $people['external_ids']['instagram_id'],
            'gender' => $this->gender($people['gender']),
            'birthday' => $this->birthDeathDate($people['birthday']),
            'deathday' => $this->birthDeathDate($people['deathday'], ''),
            'age' => $this->age($people['birthday'], $people['deathday']),
            'birthPlace' => $people['place_of_birth'] ? $people['place_of_birth'] : 'Unknown',
            'acting' => $castCredits,
            'production' => $crewCredits,
            'creditCount' => $castCredits->count() + $crewCredits->count(),
        ]);
    }

    public function knownFor(array $castCredits) : Collection
    {
        return collect($castCredits)
                        ->sortByDesc('popularity')->take(10);
    }

    public function gender(int $gender) : string
    {
        if ($gender === 1) {
            return 'Female';
        }

        if ($gender === 2) {
            return 'Male';
        }

        return 'Other/Unknown';
    }

    public function birthDeathDate(?string $date, ?string $message = 'Unknown') : string
    {
        return $date ? $this->dt->formatAsSlashDate($date) : $message;
    }

    public function age(?string $birth, ?string $death) : int
    {
        // dd($birth, $death);

        if (!$birth) {
            return 0;
        }

        if ($death) {
            return date_create($death)->diff(date_create($birth))->y;
        } else {
            return date_create($birth)->diff(date_create('today'))->y;
        }
    }

    public function creditsAsCast(array $credits) : Collection
    {
        return collect($credits)->map(function($movie) {
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
    }

    public function creditsAsProduction(array $credits) : Collection
    {
        return collect($credits)->map(function($item) {
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
    }
}