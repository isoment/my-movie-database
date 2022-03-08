<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  Show the home with a short index of users favorite
     *  tv shows and movies.
     */
    public function index() : View
    {
        return view('home', [
            'favoritesMovies' => auth()->user()->favoritesShortIndex(),
            'favoritesTV' => auth()->user()->favoritesShortIndex('TV'),
        ]);
    }

    /**
     *  Show a page with a paginated index of users favorite movies
     */
    public function movies() : View
    {
        return view('favorites.movies', [
            'favoritesMovies' => auth()->user()->favoritesIndex(),
        ]);
    }

    /**
     *  Show a page with a paginated index of users favorite tv shows
     */
    public function tv() : View
    {
        return view('favorites.tv', [
            'favoritesTV' => auth()->user()->favoritesIndex('TV'),
        ]);
    }

    public function attribution()
    {
        return view('attribution');
    }
}
