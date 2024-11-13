document.addEventListener('DOMContentLoaded', () => {
    const ingredientInput = document.getElementById('ingredient-input');
    const addIngredientBtn = document.getElementById('add-ingredient');
    const ingredientTags = document.getElementById('ingredient-tags');
    const searchRecipesBtn = document.getElementById('search-recipes');

    addIngredientBtn.addEventListener('click', addIngredient);
    ingredientInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            addIngredient();
        }
    });

    async function addIngredient() {
        const ingredient = ingredientInput.value.trim();
        if (ingredient) {
            const isValid = await validateIngredient(ingredient);
            if (isValid) {
                const tag = document.createElement('span');
                tag.classList.add('ingredient-tag');
                tag.innerHTML = `
                    ${ingredient}
                    <span class="remove-tag">&times;</span>
                `;
                tag.querySelector('.remove-tag').addEventListener('click', () => {
                    ingredientTags.removeChild(tag);
                });
                ingredientTags.appendChild(tag);
                ingredientInput.value = '';
            } else {
                alert('Ingrediente no encontrado. Por favor, verifica la ortografía.');
            }
        }
    }

    async function validateIngredient(ingredient) {
        try {
            const response = await fetch(`/api/validate-ingredient?name=${encodeURIComponent(ingredient)}`);
            const data = await response.json();
            return data.exists; // Se espera que el servidor devuelva un objeto con la propiedad 'exists'
        } catch (error) {
            console.error('Error al validar el ingrediente:', error);
            return false;
        }
    }

    searchRecipesBtn.addEventListener('click', () => {
        const ingredients = Array.from(ingredientTags.children).map(tag => tag.textContent.trim());
        console.log('Buscando recetas con ingredientes:', ingredients);
        fetch(`/api/search-recipes?ingredients=${encodeURIComponent(ingredients.join(','))}`)
            .then(response => response.json())
            .then(recipes => {
                // Manejar los resultados de la búsqueda
                console.log('Resultados de la búsqueda:', recipes);
                // Aquí puedes redirigir a la nueva vista o mostrar los resultados en la misma página
            })
            .catch(error => console.error('Error al buscar recetas:', error));
    });
});
