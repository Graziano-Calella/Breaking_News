<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AULAB POST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('article.index')}}">Tutti gli articoli</a></li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Registrati</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Accedi</a></li>
                @endguest
                @auth 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Benvenuto {{Auth::user()->name}}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('profile')}}">Profilo</a></li>
                            <li><a class="dropdown-item" href="{{route('careers')}}">Lavora con noi</a></li>
                            @if (Auth::user()->profile && Auth::user()->profile->is_admin)
                                <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>  
                            @endif
                            @if (Auth::user()->profile && Auth::user()->profile->is_revisor)
                                <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard Revisor</a></li>  
                            @endif
                            @if (Auth::user()->profile && Auth::user()->profile->is_writer)
                                <li><a class="dropdown-item" href="{{route('article.create')}}">Crea articolo</a></li>  
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" role="button" onclick="event.preventDefault(); 
                            document.querySelector('#form-logout').submit();">Logout</a></li>
                            <form action="{{route('logout')}}" method="post" id="form-logout" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth
            </ul>
            <form class="d-flex" method="GET" action="{{route('article.search')}}">
                <input class="form-control me-2" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
                <button class="btn btn-outline-info" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>