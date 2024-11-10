<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Recetas</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>
    @include("components.navbar")

    <div class="container">
        <aside class="ad-space left">
            <p>Espacio para publicidad</p>
        </aside>

        <main class="main-content">

            <section id="hero">
                <h1>Registrate y ten acceso a miles de recetas!</h1>
                <p>Ingresa tu correo , tu nombre y crea una contraseña para que puedas disfrutar de todas las funcionalidades de nuestra plataforma </p>
            </section>

            <section id="register-form">
                <h2>Registro</h2>
                <form id="registerForm">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirmar Contraseña:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit">Registrarse</button>
                </form>
                <p>¿Ya tienes una cuenta? <a href="login.html">Inicia sesión aquí</a></p>
            </section>

        </main>

        <aside class="ad-space right">
            <p>Espacio para publicidad</p>
        </aside>
    </div>

    @include("components.footer")

    <!-- Tus estructuras modales existentes -->

    <script src="{{ asset('../resources/js/auth.js') }}"></script>

    <script src="{{ asset('../resources/js/register.js') }}"></script>
</body>
</html>
