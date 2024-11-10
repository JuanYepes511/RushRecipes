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
                    <div class="recipe-card">
                        <img src="../img/paella.jpg" alt="Paella Valenciana">
                        <h3>Paella Valenciana</h3>
                        <p>Delicioso plato de arroz con mariscos, pollo y verduras, típico de Valencia.</p>
                    </div>
                    <div class="recipe-card">
                        <img src="../img/lasagna.jpg" alt="Lasaña">
                        <h3>Lasaña Clásica</h3>
                        <p>Capas de pasta, carne molida, queso y salsa de tomate, horneadas a la perfección.</p>
                    </div>
                    <div class="recipe-card">
                        <img src="../img/sushi.jpg" alt="Sushi Variado">
                        <h3>Sushi Variado</h3>
                        <p>Una selección de rollos de sushi frescos con pescado, arroz y algas.</p>
                    </div>
                    <div class="recipe-card">
                        <img src="../img/tacos.jpg" alt="Tacos al Pastor">
                        <h3>Tacos al Pastor</h3>
                        <p>Tortillas de maíz con carne de cerdo marinada, piña y cilantro.</p>
                    </div>
                    <div class="recipe-card">
                        <img src="../img/pizza.jpg" alt="Pizza Margherita">
                        <h3>Pizza Margherita</h3>
                        <p>Pizza clásica italiana con tomate, mozzarella y albahaca fresca.</p>
                    </div>
                    <div class="recipe-card">
                        <img src="../img/curry.jpg" alt="Curry de Pollo">
                        <h3>Curry de Pollo</h3>
                        <p>Suave curry de pollo con especias aromáticas y leche de coco.</p>
                    </div>
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
