<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="GREE Logo">
    </div>

    <div class="menu">
    <a href="{{ route('home') }}#home">Home</a>
    <a href="{{ route('home') }}#program">Our Program</a>
    <a href="{{ route('home') }}#about">About</a>

    @guest
        <a href="{{ route('login') }}" class="login-link">Login</a>
    @else
        <div class="user-dropdown">
            <span class="user-name">{{ Auth::user()->name }}</span>

            <div class="dropdown-content">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    @endguest
</div>
    </div>
</nav>
