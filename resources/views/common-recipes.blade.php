<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Recetas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="{{ asset('../resources/css/filter.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/common-recipes.css') }}">
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
                <h1>Encuentra todas las recetas que mas le gustan a la comunidad</h1>
                <p>Estas son solo algunas de todas las recetas que puedes encontrar en nuestra plataforma</p>
            </section>

            <section id="popular-recipes">
                <h2>Recetas Populares</h2>
                <div class="recipe-grid">
                    @include("components.recipecard")
                    @include("components.recipecard")
                    @include("components.recipecard")
                    @include("components.recipecard")
                    @include("components.recipecard")
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

    <script src="{{ asset('../resources/js/recipe-search.js') }}"></script>
</body>
</html>
