<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;
use App\Favorite;
use Illuminate\Http\RedirectResponse;

class FavoritingService
{
    /**
     *  Add a movie to the users favorites
     * 
     *  @param int $id of resource
     *  @param Request $request
     *  @return Illuminate\Http\RedirectResponse
     */
    public function addMovie(int $id, Request $request) : RedirectResponse
    {
        if (auth()->user()->userHasFavorite($id)) {
            return redirect(route('movies.show', $id))->with('error', 'Movie is already favorited');
        }

        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'poster_path' => 'required'
        ]);

        $favorite = $this->createFavorite($id, $request, 'Movie');

        if ($favorite) {
            return redirect(route('movies.show', $id))->with('success', 'Movie favorited');
        }

        return redirect(route('movies.show', $id))->with('error', 'There was an error');
    }

    /**
     *  Add a TV show to the users favorites
     * 
     *  @param int $id of resource
     *  @param Request $request
     *  @return Illuminate\Http\RedirectResponse
     */
    public function addTV(int $id, Request $request) : RedirectResponse
    {
        if (auth()->user()->userHasFavorite($id, 'TV')) {
            return redirect(route('tv.show', $id))->with('error', 'Show is already favorited');
        }

        $request->validate([
            'title' => 'required',
            'first_air_date' => 'required',
            'poster_path' => 'required'
        ]);

        $favorite = $this->createFavorite($id, $request, 'TV');

        if ($favorite) {
            return redirect(route('tv.show', $id))->with('success', 'Show favorited');
        }

        return redirect(route('tv.show', $id))->with('error', 'There was an error');
    }

    /**
     *  Delete a users favorite
     * 
     *  @param int $id of resource
     *  @param string $type of resource
     *  @return Illuminate\Http\RedirectResponse
     */
    public function deleteFavorite(int $id, string $type) : RedirectResponse
    {
        $favorite = Favorite::where('media_id', $id)
                            ->where('type', $type)
                            ->where('user_id', auth()->id());

        $favorite->delete();

        return back()->with('error', 'Unfavorited');
    }

    /**
     *  Create a favorite row in the database
     * 
     *  @param int $id of resource
     *  @param Request $request
     *  @return \App\Favorite
     */
    private function createFavorite(int $id, Request $request, string $type) : Favorite
    {
        return Favorite::create([
            'user_id' => auth()->id(),
            'type' => $type,
            'media_id' => $id,
            'title' => $request['title'],
            'release_date' => $request['release_date'] ?? $request['first_air_date'],
            'poster_path' => $request['poster_path']
        ]);
    }
}