<div class="mt-12">
    <form action="" class="flex flex-row">
        <div class="w-full relative">
            <input wire:model.debounce.500ms="search" type="text" 
                   class="px-6 py-3 w-full lg:w-8/12 rounded-full focus:outline-none text-gray-500"
                   placeholder="Search...">
            @if (strlen($search) >= 2)
                <div class="absolute bg-white border-primary-red border-2 rounded mt-2 ml-8 w-3/4 z-50">
                    @if ($searchResults->count() > 0)
                        <ul>
                            @foreach ($searchResults as $result)
                                <li class="border-b border-gray-300 text-primary-blue-dark">
                                    <a href="{{route('movies.show', $result['id'])}}" 
                                        class="hover:text-primary-red px-3 py-3 flex items-center">
                                        @if (isset($result['poster_path']))
                                            <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster" class="w-8">
                                        @elseif (isset($result['profile_path']))
                                            <img src="https://image.tmdb.org/t/p/w92/{{$result['profile_path']}}" alt="poster" class="w-8">
                                        @else
                                            <img src="/img/No-Poster.svg" alt="No Poster" class="w-8">
                                        @endif
                                        <span class="ml-4">{{ isset($result['title']) ? $result['title'] : $result['name'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="px-3 py-3">No results for {{$search}}</div>
                    @endif
                </div>
            @endif

        </div>
    </form>
</div>