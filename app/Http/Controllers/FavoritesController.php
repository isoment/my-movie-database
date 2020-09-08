<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function addFavoriteMovie($id, Request $request)
    {
        $check = Favorite::where('user_id', auth()->id())
                         ->where('media_id', $id)
                         ->where('type', 'Movie')->get();

        if (! $check->isEmpty()) {
            return redirect(route('movies.show', $id))->with('error', 'Movie is already favorited!');
        } else {
            $favoriteMovie = new Favorite;
            $favoriteMovie->user_id = auth()->id();
            $favoriteMovie->type = "Movie";
            $favoriteMovie->media_id = $id;
            $favoriteMovie->title = $request['title'];
            $favoriteMovie->release_date = $request['release_date'];
            $favoriteMovie->poster_path = $request['poster_path'];
            $favoriteMovie->save();
    
            return redirect(route('movies.show', $id))->with('success', 'Movie favorited!');
        }
    }

    public function addFavoriteTV($id, Request $request)
    {
        $check = Favorite::where('user_id', auth()->id())
                         ->where('media_id', $id)
                         ->where('type', 'TV')->get();

        if (! $check->isEmpty()) {
            return redirect(route('tv.show', $id))->with('error', 'Show is already favorited!');
        } else {
            $favoriteTV = new Favorite;
            $favoriteTV->user_id = auth()->id();
            $favoriteTV->type = "TV";
            $favoriteTV->media_id = $id;
            $favoriteTV->title = $request['title'];
            $favoriteTV->release_date = $request['first_air_date'];
            $favoriteTV->poster_path = $request['poster_path'];
            $favoriteTV->save();
    
            return redirect(route('tv.show', $id))->with('success', 'Show favorited!');
        }
    }

    public function deleteFavoriteMovie($id)
    {
        $favorite = Favorite::where('media_id', $id)
                            ->where('type', 'Movie')
                            ->where('user_id', auth()->id());

        $favorite->delete();

        return back();
    }

    public function deleteFavoriteTV($id)
    {
        $favorite = Favorite::where('media_id', $id)
                            ->where('type', 'TV')
                            ->where('user_id', auth()->id());

        $favorite->delete();

        return back();
    }
}
