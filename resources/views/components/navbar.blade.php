<link rel="stylesheet" href="{{ asset('../resources/css/navbar.css') }}">

<header>
    <div class="header-content">
            <div class="logo">
                <img src="{{ asset('../resources/images/logo.png') }}" alt="Logo">
            </div>
            <div class="nav-container">
                <nav>
                    <ul>
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('/common-recipes') }}">Common Recipes</a></li>
                        <li><a href="{{ url('/forum') }}">Forum</a></li>
                    </ul>
                </nav>
            </div>

            <div class="user-auth">
                @if(Auth::check()) <!-- Verificar si el usuario está logueado -->
                    <span id="userWelcome">Welcome, <span id="username">{{ Auth::user()->name }}</span></span>
                    
                    <!-- Formulario para hacer logout -->
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf <!-- CSRF token para seguridad -->
                        <button type="submit" id="logoutBtn">Logout</button>
                    </form>
                @else
                    <button id="loginBtn">
                        <a href="{{ route('login') }}">Login</a>
                    </button>
                    <button id="registerBtn">
                        <a href="{{ url('/register') }}">Register</a>
                    </button>
                @endif
            </div>

    </div>
</header>

<script src="{{ asset('../resources/js/recipe-search.js') }}"></script>
