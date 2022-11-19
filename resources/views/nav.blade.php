<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i></a>
                </li>
                @auth
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Posts </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Show Posts</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Create New Post</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>

            @auth
            <div class="ml-3">
                <a href="{{ route('user.logout') }}" class="btn btn-secondary"><i class="bi bi-sign-turn-left"></i> Logout</a>
            </div>
            @endauth

            @guest
            <div class="ml-3">
                @if (!request()->routeIs('user.login'))
                <a href="{{ route('user.login') }}" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
                @endif

                @if (!request()->routeIs('user.signup'))
                <a href="{{ route('user.signup') }}" class="btn btn-success">
                    <i class="bi bi-box-arrow-in-up"></i> Signup
                </a>
                @endif
            </div>
            @endguest
        </div>
    </div>
</nav>