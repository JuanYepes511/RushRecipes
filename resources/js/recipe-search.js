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

    function addIngredient() {
        const ingredient = ingredientInput.value.trim();
        if (ingredient) {
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
        }
    }

    searchRecipesBtn.addEventListener('click', () => {
        const ingredients = Array.from(ingredientTags.children).map(tag => tag.textContent.trim());
        // Aquí normalmente enviarías una solicitud a tu servidor o API para buscar recetas
        console.log('Buscando recetas con ingredientes:', ingredients);
        // Por ahora, solo registraremos los ingredientes en la consola
    });
});
