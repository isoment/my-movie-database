<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Services\FavoritingService;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct(private FavoritingService $favorite)
    {
        $this->middleware('auth');
    }

    public function addFavoriteMovie($id, Request $request)
    {
        return $this->favorite->addMovie($id, $request);
    }

    public function addFavoriteTV($id, Request $request)
    {
        return $this->favorite->addTV($id, $request);
    }

    public function deleteFavoriteMovie($id)
    {
        return $this->favorite->deleteFavorite($id, 'Movie');
    }

    public function deleteFavoriteTV($id)
    {
        return $this->favorite->deleteFavorite($id, 'TV');
    }
}
