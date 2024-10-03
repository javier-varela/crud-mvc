<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear algunas categorías
        Category::create(['title' => 'Tecnología', 'slug' => 'tecnologia']);
        Category::create(['title' => 'Salud', 'slug' => 'salud']);
        Category::create(['title' => 'Deportes', 'slug' => 'deportes']);
        Category::create(['title' => 'Viajes', 'slug' => 'viajes']);
        Category::create(['title' => 'Comida', 'slug' => 'comida']);
        Category::create(['title' => 'Moda', 'slug' => 'moda']);
        Category::create(['title' => 'Educación', 'slug' => 'educacion']);
        Category::create(['title' => 'Entretenimiento', 'slug' => 'entretenimiento']);
        Category::create(['title' => 'Negocios', 'slug' => 'negocios']);
        Category::create(['title' => 'Ciencia', 'slug' => 'ciencia']);
        Category::create(['title' => 'Arte', 'slug' => 'arte']);
        Category::create(['title' => 'Historia', 'slug' => 'historia']);
        Category::create(['title' => 'Literatura', 'slug' => 'literatura']);
        Category::create(['title' => 'Automóviles', 'slug' => 'automoviles']);
        Category::create(['title' => 'Familia', 'slug' => 'familia']);
    }
}
