<?php

namespace App\Http\Controllers;

use App\Services\TheMovieDBService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class MainController extends Controller
{
    private TheMovieDBService $tmdb;

    public function __construct(TheMovieDBService $theMovieDBService)
    {
        $this->tmdb = $theMovieDBService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        return view('main', [
            'popularMovies' => $this->tmdb->popularMovies(),
            'popularTV' => $this->tmdb->popularTV(),
            'trending' => $this->tmdb->thisWeekTrending(),
        ]);
    }
}
