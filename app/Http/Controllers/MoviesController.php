<?php

namespace App\Http\Controllers;

use App\Services\ShowMovieService;
use App\Services\TheMovieDBService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class MoviesController extends Controller
{
    public function __construct(
        private TheMovieDBService $tmdb,
        private ShowMovieService $showMovieService
    ) {}

    /**
     *  Display a listing of the resource.
     *
     *  @param int $page
     *  @return \Illuminate\View\View
     */
    public function topRated(int $page = 1) : View
    {
        abort_if($page > 500, 204);

        $topRated = $this->tmdb->topRatedMovies($page);

        return view('movies.top-rated', [
            'topRated' => $topRated,
        ]);
    }

    /**
     *  Display the individual movie.
     *
     *  @param int $id
     *  @return \Illuminate\View\View
     */
    public function show(int $id) : View
    {
        return $this->showMovieService->movie($id);
    }

}
