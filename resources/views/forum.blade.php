<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Recetas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="{{ asset('../resources/css/forum.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
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
                <h1>Debate y complementa las recetas que propones con la comunidad</h1>
                <p>Un espacio para que puedas debatir y complementar las recetas que propones con la comunidad</p>
            </section>

            <section id="forum">
                <div id="post-form" style="display: none;">
                    <h2>Crear nueva publicación</h2>
                    <form id="new-post-form">
                        <input type="text" id="post-title" placeholder="Título de la publicación" required>
                        <textarea id="post-content" placeholder="Contenido de la publicación" required></textarea>
                        <button type="submit">Publicar</button>
                    </form>
                </div>

                <div id="login-message" style="display: block;">
                    <p>Debes iniciar sesión para participar en el foro. <a href="login.html">Iniciar sesión</a></p>
                </div>

                <div id="posts-container">
                    <!-- Las publicaciones se cargarán aquí dinámicamente -->
                </div>
            </section>
        </main>

        <aside class="ad-space right">
            <p>Espacio para publicidad</p>
        </aside>
    </div>

@include("components.footer")

    <!-- Tus estructuras modales existentes -->


    <script src="{{ asset('../resources/js/auth.js') }}"></script>

    <script src="{{ asset('../resources/js/forum.js') }}"></script>
</body>
</html>
