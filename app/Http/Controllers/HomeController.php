<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favoritesMovies = Favorite::where('type', 'Movie')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $favoritesTV = Favorite::where('type', 'TV')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // dump($favoritesMovies);

        return view('home', [
            'favoritesMovies' => $favoritesMovies,
            'favoritesTV' => $favoritesTV,
        ]);
    }

    public function movies()
    {
        $favoritesMovies = Favorite::where('type', 'Movie')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(24);

        return view('favorites.movies', [
            'favoritesMovies' => $favoritesMovies,
        ]);
    }

    public function tv()
    {
        $favoritesTV = Favorite::where('type', 'TV')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(24);

        return view('favorites.tv', [
            'favoritesTV' => $favoritesTV,
        ]);
    }
}
