<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/common-recipes.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/filter.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/common-recipes.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    @include("components.navbar")
    <div class="container">
        <aside class="ad-space left">
            <p>Espacio para publicidad</p>
        </aside>
        <main class="main-content">
            <section id="searched-recipes">
                <h2>Resultados</h2>
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

    <script>
        // Obtener los ingredientes de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const ingredients = urlParams.get('ingredients');

        // Hacer la solicitud para buscar recetas
        fetch(`/api/search-recipes?ingredients=${encodeURIComponent(ingredients)}`)
            .then(response => response.json())
            .then(recipes => {
                const resultsContainer = document.getElementById('results-container');
                recipes.forEach(recipe => {
                    const recipeCard = document.createElement('div');
                    recipeCard.classList.add('recipe-card');
                    recipeCard.innerHTML = `
                        <img src="../img/${recipe.image}" alt="${recipe.title}">
                        <h3>${recipe.title}</h3>
                        <p>${recipe.description}</p>
                        <a href="recipe-detail.html?id=${recipe.id}" class="view-recipe">Ver Receta</a>
                    `;
                    resultsContainer.appendChild(recipeCard);
                });
            })
            .catch(error => console.error('Error al buscar recetas:', error));
    </script>
</body>
</html>
