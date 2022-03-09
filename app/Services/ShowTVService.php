<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\View\View;

class ShowTVService extends TheMovieDBService
{
    public function __construct(private DataTransformService $dt)
    {}

    public function tv(int $id) : View
    {
        $tvShow = $this->showTV($id);

        abort_if(isset($tvShow['success']) && $tvShow['success'] == false, 404);

        return view('tv.show', [
            'tvShow' => $tvShow,
            'releaseYear' => $this->dt->formatAsYear($tvShow['first_air_date']),
            'rating' => $this->tvRating($tvShow['content_ratings']['results']),
            'firstAir' => $this->dt->formatAsSlashDate($tvShow['first_air_date']),
            'genres' => $this->dt->genres($tvShow['genres']),
            'runTime' => collect($tvShow['episode_run_time'])->first(),
            'vote' => $this->dt->votePercentage($tvShow['vote_average']),
            'creator' => collect($tvShow['created_by'])->take(3),
            'cast' => collect($tvShow['credits']['cast']),
            'keywords' => $this->dt->keywords($tvShow['keywords']['results']),
            'status' => $tvShow['status'],
            'latestAir' => $this->dt->formatAsSlashDate($tvShow['last_air_date']),
            'facebook' => 'https://www.facebook.com/' . $tvShow['external_ids']['facebook_id'],
            'twitter' => 'https://twitter.com/' . $tvShow['external_ids']['twitter_id'],
            'instagram' => 'https://www.instagram.com/' . $tvShow['external_ids']['instagram_id'],
            'userFavorite' => $this->dt->isUserFavorite($id, 'TV')
        ]);
    }

    public function tvRating(array $contentRatingResults) : string
    {
        $rating = collect($contentRatingResults)
                        ->where('iso_3166_1', 'US')->first();

        if (!empty($rating)) {
            return $rating['rating'];
        }

        return 'NR';
    }
}