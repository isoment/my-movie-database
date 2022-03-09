<?php

namespace App\Http\Controllers;

use App\Services\ShowMovieService;
use App\Services\TheMovieDBService;
use Illuminate\View\View;

class MoviesController extends Controller
{
    public function __construct(
        private TheMovieDBService $tmdb,
        private ShowMovieService $showMovieService
    ) {}

    public function topRated(int $page = 1) : View
    {
        abort_if($page > 500, 204);

        return view('movies.top-rated', [
            'topRated' => $this->tmdb->topRatedMovies($page),
        ]);
    }

    public function show(int $id) : View
    {
        return $this->showMovieService->movie($id);
    }

}
