<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Recetas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="{{ asset('../resources/css/forum.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/login.css') }}">
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
                <h1>Propon nuevas recetas que te gustaría ver en RushRecipes</h1>
                <p>Un espacio para que puedas sugerir recetas que le ayuden a la comunidad</p>
            </section>

            <!-- Formulario para enviar una sugerencia de receta -->
            <section id="suggestion-form">
                <h2>Envía tu receta sugerida</h2>

                <!-- Formulario de sugerencia -->
                <form id="recipeSuggestionForm">
                    @csrf <!-- Protección CSRF -->

                    <!-- Nombre de la receta -->
                    <div class="form-group">
                        <label for="recipeName">Nombre de la receta:</label>
                        <input type="text" id="recipeName" name="recipeName" value="{{ old('recipeName') }}" required placeholder="Nombre de la receta">
                        @error('recipeName')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Ingredientes -->
                    <div class="form-group">
                        <label for="ingredients">Ingredientes:</label>
                        <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients') }}" required placeholder="Ingredientes separados por coma">
                        @error('ingredients')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Preparación -->
                    <div class="form-group">
                        <label for="preparation">Preparación:</label>
                        <input type="text" id="preparation" name="preparation" value="{{ old('preparation') }}" required placeholder="Preparación">
                        @error('preparation')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit" class="submit-btn">Enviar Sugerencia</button>
                </form>
            </section>

            <!-- Contenedor de publicaciones -->
            <div id="posts-container">
                <!-- Las publicaciones se cargarán aquí dinámicamente -->
            </div>

        </main>

        <aside class="ad-space right">
            <p>Espacio para publicidad</p>
        </aside>
    </div>

    @include("components.footer")

    <!-- Scripts -->
    <script src="{{ asset('../resources/js/auth.js') }}"></script>
    <script src="{{ asset('../resources/js/forum.js') }}"></script>

    <script>
        // Lógica de manejo del formulario de sugerencia (simulación)
        document.getElementById('recipeSuggestionForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío real del formulario

            // Obtener los valores del formulario
            const recipeName = document.getElementById('recipeName').value;
            const ingredients = document.getElementById('ingredients').value;
            const preparation = document.getElementById('preparation').value;

            // Simulación del "envío" de la receta (en este caso, solo lo mostramos en consola)
            console.log('Receta Sugerida:', {
                recipeName,
                ingredients,
                preparation
            });

            // Mostrar un mensaje en la página (puedes personalizarlo para ser más atractivo)
            const messageContainer = document.createElement('div');
            messageContainer.classList.add('success-message');
            messageContainer.innerHTML = `
                <p><strong>¡Gracias por tu sugerencia!</strong></p>
                <p>La receta: <strong>${recipeName}</strong> ha sido enviada correctamente.</p>
            `;
            document.getElementById('posts-container').prepend(messageContainer);  // Agregar mensaje al principio del contenedor

            // Limpiar el formulario después de enviar
            document.getElementById('recipeSuggestionForm').reset();
        });
    </script>

    <!-- Estilos para el mensaje de éxito -->
    <style>
        .success-message {
            background-color: #28a745;
            color: white;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }
    </style>

</body>
</html>
