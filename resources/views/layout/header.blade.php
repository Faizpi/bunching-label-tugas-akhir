<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @if(Auth::check())
                    @if(Auth::user()->isUser())
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('web.auth.signout')}}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('web.dashboard.index')}}">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('web.auth.signout')}}">Logout</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('web.admin.login')}}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>