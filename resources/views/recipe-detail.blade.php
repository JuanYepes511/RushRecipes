<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Receta</title>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
</head>
<body>
    @include("components.navbar")
    
    <div class="container">
        <main class="main-content">
            <section id="recipe-detail">
                <h1>{{ $recipe->title }}</h1>
                <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" id="recipe-image" style="max-width: 400px;">
                <p id="recipe-description">{{ $recipe->description }}</p>
                <h2>Ingredientes</h2>
                <ul id="recipe-ingredients">
                    @foreach(explode(',', $recipe->ingredients) as $ingredient)
                        <li>{{ trim($ingredient) }}</li>
                    @endforeach
                </ul>
                <h2>Preparación</h2>
                <p id="recipe-preparation">{{ $recipe->preparation }}</p>
            </section>
        </main>
    </div>

    @include("components.footer")
</body>
</html>
