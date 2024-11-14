<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Receta</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/home.css') }}">
    <style>/* Estilos para el recuadro de la receta */
        .recipe-box {
            background-color: white; /* Fondo blanco */
            padding: 20px; /* Espaciado interno */
            border-radius: 15px; /* Bordes redondeados */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil alrededor del recuadro */
            margin: 20px auto; /* Márgenes para centrar el recuadro */
            max-width: 800px; /* Ancho máximo del recuadro */
            border: 1px solid #ddd; /* Borde sutil */
        }
        
        /* Estilos para la imagen de la receta */
        #recipe-image {
            display: block; /* Hace que la imagen esté centrada */
            margin: 0 auto 20px; /* Margen inferior para separar de la descripción */
            border-radius: 10px; /* Bordes redondeados para la imagen */
        }
        
        /* Estilos para los títulos dentro del recuadro */
        #recipe-detail h1,
        #recipe-detail h2 {
            font-size: 1.5em; /* Tamaño de fuente para los encabezados */
            color: #333; /* Color del texto */
            margin-bottom: 10px; /* Espaciado debajo de los encabezados */
        }
        
        /* Estilos para la lista de ingredientes */
        #recipe-ingredients {
            list-style-type: disc; /* Estilo de lista con puntos */
            padding-left: 20px; /* Espaciado a la izquierda */
            margin-bottom: 20px; /* Separación de la lista de preparación */
        }
        
        /* Estilos para la descripción y preparación */
        #recipe-description,
        #recipe-preparation {
            font-size: 1.1em; /* Tamaño de fuente ligeramente mayor */
            line-height: 1.6; /* Interlineado para mejorar la legibilidad */
            color: #555; /* Color más suave para el texto */
            margin-bottom: 20px; /* Espaciado inferior */
        }
        </style>
</head>
<body>
    @include("components.navbar")
    
    <div class="container">
        <aside class="ad-space left">
            <p>Espacio para publicidad</p>
        </aside>
        <main class="main-content">
            <section id="recipe-detail" class="recipe-box">
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
        
        <aside class="ad-space right">
            <p>Espacio para publicidad</p>
        </aside>
    </div>

    @include("components.footer")
</body>
</html>
