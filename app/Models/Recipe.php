<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // Si la tabla no sigue la convención de nombres, especifica el nombre de la tabla
    protected $table = 'recipes';

    // Si no usas timestamps, descomenta la siguiente línea
    // public $timestamps = false;

    // Define los campos que se pueden llenar
    protected $fillable = ['title', 'slug', 'description', 'preparation','image','ingredients'];
}