<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        // Obtener todas las recetas
        $recipes = Recipe::all();

        // Pasar las recetas a la vista
        return view('welcome', compact('recipes'));
    }
}