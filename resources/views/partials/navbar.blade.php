<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">tiMovie</a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Watchlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('movies.create') ? 'active' : '' }}"
                       href="{{ route('movies.create') }}">Input Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('movies.data') ? 'active' : '' }}"
                       href="{{ route('movies.data') }}">Data Movie</a>
                </li>
            </ul>
            <form action="{{ route('home') }}" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search"
                       placeholder="Cari film..." value="{{ request('search') }}">
                <button class="btn btn-outline-light" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>
