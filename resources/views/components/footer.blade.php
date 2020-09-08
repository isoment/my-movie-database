<footer class="bg-primary-blue-dark text-white py-6">
    <div class="container mx-auto flex flex-col md:flex-row md:justify-around px-12 md:px-12 lg:px-32 xl:px-64 md:mb-12">
        <div class="flex flex-col mt-3 md:mt-9 md:mr-8">
            <img src="/img/logo.svg" alt="footer-logo" class="h-10 md:h-12 hidden md:block">
            <div class="bg-white text-primary-blue-med mt-4 text-center p-2 rounded-lg
                        font-bold border-2 border-primary-red" style="max-width: 250px">
                {{auth()->user() ? 'Hi ' . auth()->user()->name . '!' : 'Join Now!'}}
            </div>
        </div>
        <div class="md:ml-10 mt-8 md:mt-9 flex flex-col">
            <h2 class="font-bold md:mb-2 uppercase text-lg">The Basics</h2>
            <a href="{{ route('movies.top') }}" class="mt-1">Movies</a>
            <a href="{{ route('tv.top') }}" class="mt-1">TV Shows</a>
            <a href="{{ route('people.popular') }}" class="mt-1">People</a>
            <a href="{{ route('favorite.movies') }}" class="mt-1">Favorite Movies</a>
            <a href="{{ route('favorite.tv') }}" class="mt-1">Favorite TV</a>
        </div>
        <div class="md:ml-10 mt-8 md:mt-9 flex flex-col">
            <h2 class="font-bold md:mb-2 uppercase text-lg">Other</h2>
            <a href="#" class="mt-1">Item</a>
            <a href="#" class="mt-1">Other</a>
            <a href="#" class="mt-1">This</a>
            <a href="#" class="mt-1">That</a>
        </div>
        <div class="md:ml-10 mt-8 mb-6 md:mb-0 md:mt-9 flex flex-col">
            <h2 class="font-bold md:mb-2 uppercase text-lg">API</h2>
            <a href="https://www.themoviedb.org" class="mt-1">The Movie Database</a>
            <a href="https://www.themoviedb.org/documentation/api" class="mt-1">API Documentation</a>
            <a href="#" class="mt-1">Attribution</a>
        </div>
    </div>
</footer>