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
                    
                    <!-- Mostrar "Suggestions" solo si el usuario está logueado -->
                    @if(Auth::check())
                        <li><a href="{{ url('/forum') }}">Suggestions</a></li>
                        <li><a href="{{ url('/payment') }}">Become Premium</a></li>
                    @else
                        <li><a href="{{ url('/login') }}">Become Premium</a></li>
                    @endif
                </ul>
            </nav>
        </div>

        <div class="user-auth">
            @if(Auth::check()) <!-- Verificar si el usuario está logueado -->
                <span id="userWelcome">Welcome, 
                    <!-- Enlace al perfil del usuario -->
                    <a href="{{ "http://localhost/RushRecipes/public/profile" }}" id="username">{{ Auth::user()->name }}</a>
                </span>
                
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
