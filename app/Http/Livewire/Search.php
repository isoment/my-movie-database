<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';

    public function render() : View
    {
        $searchResults = [];

        if (strlen($this->search) >= 2) {

            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/multi?query=' . $this->search)
                ->json()['results'];
            }

        return view('livewire.search', [
            'searchResults' => collect($searchResults)->take(8),
        ]);
    }
}
