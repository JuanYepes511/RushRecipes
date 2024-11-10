<link rel="stylesheet" href="{{ asset('../resources/css/navbar.css') }}">

<header>
    <div class="header-content">
            <div class="logo">
                <img src="{{ asset('../resources/images/logo.png') }}" alt="Logo">
            </div>
            <div class="nav-container">
                <nav>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/common-recipes') }}">Common Recipes</a></li>
                        <li><a href="{{ url('/forum') }}">Forum</a></li>
                    </ul>
                </nav>
            </div>
            <div class="user-auth">
                <button id="loginBtn"><a href="{{ url('/login') }}">Login</a></button>
                <button id="registerBtn"><a href="{{ url('/register') }}">Register</a></button>
                <span id="userWelcome" style="display: none;">Welcome, <span id="username"></span></span>
                <button id="logoutBtn" style="display: none;">Logout</button>
            </div>
    </div>
</header>
<script src="{{ asset('../resources/js/recipe-search.js') }}"></script>
