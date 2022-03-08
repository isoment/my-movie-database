<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pagination\LengthAwarePaginator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorites() 
    {
        return $this->hasMany('App\Favorite', 'user_id');
    }

    /**
     *  Determine if a user has the media as a favorite
     * 
     *  @param int $mediaId
     *  @param string $type
     *  @return bool
     */
    public function userHasFavorite(int $mediaId, string $type = 'Movie') : bool
    {
        return $this->favorites->where('media_id', $mediaId)
            ->where('type', $type)
            ->isNotEmpty();
    }

    /**
     *  Get a short listing of the users favorites
     * 
     *  @param string $type
     *  @return \Illuminate\Database\Eloquent\Collection
     */
    public function favoritesShortIndex(string $type = 'Movie') : Collection
    {
        return $this->favorites->where('type', $type)
            ->sortByDesc('created_at')
            ->take(6);
    }

    /**
     *  Get a short listing of the users favorites
     * 
     *  @param string $type
     *  @return \Illuminate\Pagination\LengthAwarePaginator;
     */
    public function favoritesIndex(string $type = 'Movie') : LengthAwarePaginator
    {
        return Favorite::where('user_id', $this->id)
            ->where('type', $type)
            ->orderBy('created_at', 'desc')
            ->paginate(24);
    }
}
