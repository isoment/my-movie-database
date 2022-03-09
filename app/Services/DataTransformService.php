<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DataTransformService
{
    /**
     *  Take a date string input and return the year
     * 
     *  @param string $date the date as a string
     *  @return string
     */
    public function formatAsYear(string $date) : string
    {
        return Carbon::parse($date)->format('Y');
    }

    /**
     *  Format a date as MM/DD/YYYY
     * 
     *  @param string $date the date as a string
     *  @return string
     */
    public function formatAsSlashDate(string $date) : string
    {
        return Carbon::parse($date)->format('m/d/Y');
    }

    /**
     *  Get the genres for a media as a string
     * 
     *  @param array $genres
     *  @return string
     */
    public function genres(array $genres) : string
    {
        return collect($genres)->pluck('name')->implode(', ');
    }

    /**
     *  A percentage representation of votes
     * 
     *  @param float $voteAvg
     *  @return float
     */
    public function votePercentage(float $voteAvg) : float
    {
        return $voteAvg * 10;
    }

    /**
     *  Take 15 maximum keywords or return a string if there are none
     * 
     *  @param array $keywords
     *  @return Collection|string
     */
    public function keywords(array $keywords) : Collection|string
    {
        return $keywords ? collect($keywords)->take(15) : 'No Keywords';
    }

    /**
     *  Check if the media is favorited by the user or return false
     * 
     *  @param int $id
     *  @param string $type
     *  @return bool
     */
    public function isUserFavorite(int $id, string $type) : bool
    {
        if (auth()->user()) {
            return auth()->user()->userHasFavorite($id, $type);
        }

        return false;
    }
}