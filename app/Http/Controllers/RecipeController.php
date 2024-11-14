<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        // Obtener los ingredientes desde la URL
        $ingredients = $request->input('ingredients', []);
        // dd($ingredients);
        // Si los ingredientes se pasan como una cadena, convertirla en un array
        if (is_string($ingredients)) {
            $ingredients = explode(',', $ingredients);  // Convertir la cadena separada por comas en un array
        }

        // Inicializar la consulta para las recetas
        $recipes = Recipe::query();

        // Si hay ingredientes en la búsqueda, aplicamos un filtro en el campo 'ingredients'
        if (!empty($ingredients)) {
            foreach ($ingredients as $ingredient) {
                // Usamos el operador LIKE para buscar coincidencias en el campo 'ingredients'
                $recipes->where('ingredients', 'LIKE', '%' . trim($ingredient) . '%');
            }
        }

        // Obtener todas las recetas si no se pasaron ingredientes
        $recipes = $recipes->get();

        // Pasar las recetas a la vista
        return view('welcome', ['recipes' => $recipes]);
    }
}
