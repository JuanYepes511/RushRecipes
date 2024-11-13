<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Receta</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
</head>
<body>
    @include("components.navbar")
    
    <div class="container">
        <main class="main-content">
            <section id="recipe-detail">
                <h1 id="recipe-title"></h1>
                <img id="recipe-image" src="" alt="">
                <p id="recipe-description"></p>
                <h2>Ingredientes</h2>
                <ul id="recipe-ingredients"></ul>
                <h2>Preparación</h2>
                <p id="recipe-preparation"></p>
            </section>
        </main>
    </div>

    @include("components.footer")

    <script>
        // Obtener el ID de la receta de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const recipeId = urlParams.get('id');

        // Hacer la solicitud para obtener los detalles de la receta
        fetch(`/api/recipe/${recipeId}`)
            .then(response => response.json())
            .then(recipe => {
                document.getElementById('recipe-title').textContent = recipe.title;
                document.getElementById('recipe-image').src = recipe.image;
                document.getElementById('recipe-description').textContent = recipe.description;
                document.getElementById('recipe-preparation').textContent = recipe.preparation;

                const ingredientsList = document.getElementById('recipe-ingredients');
                recipe.ingredients.split(',').forEach(ingredient => {
                    const li = document.createElement('li');
                    li.textContent = ingredient.trim();
                    ingredientsList.appendChild(li);
                });
            })
            .catch(error => console.error('Error al obtener los detalles de la receta:', error));
    </script>
</body>
</html>
