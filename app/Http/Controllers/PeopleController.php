<?php

namespace App\Http\Controllers;

use App\Services\ShowPersonService;
use App\Services\TheMovieDBService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PeopleController extends Controller
{
    public function __construct(
        private TheMovieDBService $tmdb,
        private ShowPersonService $showPersonService
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular($page = 1) : View
    {
        return view('people.popular', [
            'popularPeople' => $this->tmdb->popularPeople($page),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : View
    {
        return $this->showPersonService->person($id);
    }
}
