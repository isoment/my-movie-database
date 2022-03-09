<?php

namespace App\Http\Controllers;

use App\Services\ShowTVService;
use App\Services\TheMovieDBService;
use Illuminate\View\View;

class TvController extends Controller
{
    public function __construct(
        private TheMovieDBService $tmdb,
        private ShowTVService $showTVService
    ) {}

    public function topRated($page = 1) : View
    {
        abort_if($page > 500, 204);

        return view('tv.top-rated', [
            'topRated' => $this->tmdb->topRatedTV($page)
        ]);
    }

    public function show($id) : View
    {
        return $this->showTVService->tv($id);
    }
}
