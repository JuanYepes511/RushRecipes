<link rel="stylesheet" href="{{ asset('../resources/css/home.css') }}">
<link rel="stylesheet" href="{{ asset('../resources/css/filter.css') }}">

<div class="container">
    <aside class="ad-space left">
        <p>Espacio para publicidad</p>
    </aside>

    <main class="main-content">
        <section id="hero">
            <h1>Encuentra la Receta Perfecta con tus Ingredientes</h1>
            <p>Ingresa los ingredientes que tienes y encontraremos deliciosas recetas para ti!</p>
        </section>

        <section id="recipe-search">
            <div class="search-container">
                <input type="text" id="ingredient-input" placeholder="Ingresa un ingrediente...">
                <button id="add-ingredient">Agregar</button>
            </div>
            <div id="ingredient-tags"></div>
            <button id="search-recipes">Buscar Recetas</button>
        </section>

        <div id="recipe-list">
            <!-- Aquí se mostrarán las recetas -->
            @foreach($recipes as $recipe)
                <div class="recipe-item">
                    <h3>{{ $recipe->title }}</h3>
                    <p>Ingredientes: {{ $recipe->ingredients }}</p>
                    <p>Descripción: {{ $recipe->description }}</p>
                    <p>Preparación: {{ $recipe->preparation }}</p>
                    @if($recipe->image)
                        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="max-width: 200px;">
                    @endif
                </div>
            @endforeach
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const addButton = document.getElementById('add-ingredient');
                const searchButton = document.getElementById('search-recipes');
                const ingredientTagsContainer = document.getElementById('ingredient-tags');
                
                // Recupera los ingredientes guardados en localStorage y muestra las etiquetas
                loadSavedIngredients();

                // Verifica que el botón 'add-ingredient' exista antes de agregar el listener
                if (addButton) {
                    addButton.addEventListener('click', function() {
                        const ingredientInput = document.getElementById('ingredient-input');
                        const ingredientValue = ingredientInput.value.trim();

                        if (ingredientValue) {
                            // Verifica si el ingrediente ya ha sido agregado
                            const existingTags = document.querySelectorAll('#ingredient-tags .tag');
                            const ingredientAlreadyExists = Array.from(existingTags).some(tag => tag.textContent === ingredientValue);

                            if (!ingredientAlreadyExists) {
                                const tag = document.createElement('span');
                                tag.className = 'tag';
                                tag.textContent = ingredientValue;  // Solo el texto del ingrediente

                                // Aquí se agrega el evento para eliminar al hacer clic en la etiqueta
                                tag.addEventListener('click', function() {
                                    tag.remove();
                                    updateLocalStorage(); // Actualizar localStorage después de eliminar una etiqueta
                                });

                                ingredientTagsContainer.appendChild(tag);
                                ingredientInput.value = ''; // Limpiar el campo de entrada

                                updateLocalStorage(); // Actualizar localStorage después de agregar una etiqueta
                            } else {
                                alert('Este ingrediente ya ha sido agregado.');
                            }
                        }
                    });
                } else {
                    console.error("No se encontró el botón 'add-ingredient'");
                }

                // Verifica que el botón 'search-recipes' exista antes de agregar el listener
                if (searchButton) {
                    searchButton.addEventListener('click', updateRecipeList);
                } else {
                    console.error("No se encontró el botón 'search-recipes'");
                }

                // Función para actualizar la lista de recetas
                function updateRecipeList() {
                    const ingredientTags = Array.from(document.querySelectorAll('#ingredient-tags .tag'));
                    const ingredients = ingredientTags.map(tag => tag.textContent);

                    // Redirigir a la URL con los ingredientes como parámetros
                    window.location.href = `http://localhost/RushRecipes/public/home/?ingredients=${encodeURIComponent(ingredients.join(','))}`;
                }

                // Función para guardar los ingredientes en localStorage
                function updateLocalStorage() {
                    const ingredients = Array.from(document.querySelectorAll('#ingredient-tags .tag')).map(tag => tag.textContent);
                    localStorage.setItem('ingredients', JSON.stringify(ingredients));
                }

                // Función para cargar los ingredientes desde localStorage
                function loadSavedIngredients() {
                    const savedIngredients = JSON.parse(localStorage.getItem('ingredients')) || [];
                    savedIngredients.forEach(function(ingredient) {
                        const tag = document.createElement('span');
                        tag.className = 'tag';
                        tag.textContent = ingredient;

                        // Aquí se agrega el evento para eliminar al hacer clic en la etiqueta
                        tag.addEventListener('click', function() {
                            tag.remove();
                            updateLocalStorage(); // Actualizar localStorage después de eliminar una etiqueta
                        });

                        ingredientTagsContainer.appendChild(tag);
                    });
                }
            });
        </script>

        <section id="about-us">
            <h2>Sobre Nosotros</h2>
            <p>Nos apasiona ayudarte a crear deliciosas comidas con los ingredientes que ya tienes. Nuestro buscador inteligente de recetas elimina el estrés de la planificación de comidas y reduce el desperdicio de alimentos.</p>
        </section>

        @include("components.contact")
    </main>

    <aside class="ad-space right">
        <p>Espacio para publicidad</p>
    </aside>
</div>
