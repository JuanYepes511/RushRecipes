<link rel="stylesheet" href="{{ asset('../resources/css/filter.css') }}">

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
        
        // Verifica que el botón 'add-ingredient' exista antes de agregar el listener
        if (addButton) {
            addButton.addEventListener('click', function() {
                const ingredientInput = document.getElementById('ingredient-input');
                const ingredientValue = ingredientInput.value.trim();

                if (ingredientValue) {
                    const tag = document.createElement('span');
                    tag.className = 'tag';
                    tag.textContent = ingredientValue;

                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'x';
                    removeButton.onclick = function() {
                        tag.remove();
                        updateRecipeList(); // Actualizar la lista después de eliminar una etiqueta
                    };

                    tag.appendChild(removeButton);
                    document.getElementById('ingredient-tags').appendChild(tag);
                    ingredientInput.value = ''; // Limpiar el campo de entrada

                    updateRecipeList(); // Actualizar la lista después de agregar una etiqueta
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
    });
</script>