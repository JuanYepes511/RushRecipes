<link rel="stylesheet" href="{{ asset('../resources/css/filter.css') }}">

<section id="recipe-search">
                <div class="search-container">
                    <input type="text" id="ingredient-input" placeholder="Ingresa un ingrediente...">
                    <button id="add-ingredient">Agregar</button>
                </div>
                <div id="ingredient-tags"></div>
                <button id="search-recipes">Buscar Recetas</button>
</section>
<script src="{{ asset('js/recipe-search.js') }}"></script>
