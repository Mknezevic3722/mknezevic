<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('istaknuto') }}">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Katalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kontakt') }}">Kontakt</a>
            </li>
            @auth
                @if(auth()->user()->role !== 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">Moje narudžbine</a>
                    </li>
                @endif
            @endauth

        </ul>

        <ul class="navbar-nav ms-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" style="display: inline; padding: 0; margin: 0;">
                            Logout
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>
