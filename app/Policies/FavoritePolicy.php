<?php

namespace App\Policies;

use App\Favorite;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FavoritePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Favorite $favorite)
    {
        return $user->id === $favorite->user_id;
    }

}
