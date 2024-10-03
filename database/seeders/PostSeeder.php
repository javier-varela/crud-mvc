<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener las categorías existentes
        $categories = Category::all();

        // Verificar si hay categorías disponibles
        if ($categories->isEmpty()) {
            // Si no hay categorías, crear algunas para usar
            $category1 = Category::create(['title' => 'Tecnología', 'slug' => 'tecnologia']);
            $category2 = Category::create(['title' => 'Salud', 'slug' => 'salud']);
        } else {
            // Tomar las primeras dos categorías existentes
            $category1 = $categories->first(); // Primera categoría
            $category2 = $categories->skip(1)->first(); // Segunda categoría
        }

        // Crear algunas publicaciones
        Post::create([
            'title' => 'Las últimas tendencias en tecnología',
            'slug' => 'ultimas-tendencias-tecnologia',
            'description' => 'Un vistazo a las últimas innovaciones en el mundo de la tecnología.',
            'content' => 'La tecnología avanza a pasos agigantados. En este artículo, exploramos...',
            'image_url' => 'url_del_imagen_1.jpg',
            'published' => true,
            'category_id' => $category1->id,
        ]);

        Post::create([
            'title' => 'Consejos para una vida saludable',
            'slug' => 'consejos-vida-saludable',
            'description' => 'Descubre algunos consejos prácticos para mantenerte saludable.',
            'content' => 'Mantenerse saludable requiere esfuerzo. Aquí hay algunos consejos...',
            'image_url' => 'url_del_imagen_2.jpg',
            'published' => true,
            'category_id' => $category2->id,
        ]);

        Post::create([
            'title' => 'Novedades en el mundo del deporte',
            'slug' => 'novedades-deporte',
            'description' => 'Las últimas noticias sobre eventos deportivos.',
            'content' => 'El mundo del deporte está lleno de sorpresas. Aquí están las últimas...',
            'image_url' => 'url_del_imagen_3.jpg',
            'published' => true,
            'category_id' => $category1->id,
        ]);

        Post::create([
            'title' => 'Viajar en tiempos de pandemia',
            'slug' => 'viajar-pandemia',
            'description' => 'Guía para viajar de forma segura en la actualidad.',
            'content' => 'Viajar durante la pandemia puede ser complicado. Aquí tienes algunos...',
            'image_url' => 'url_del_imagen_4.jpg',
            'published' => true,
            'category_id' => $category2->id,
        ]);

        Post::create([
            'title' => 'Las mejores aplicaciones para estudiar',
            'slug' => 'mejores-aplicaciones-estudio',
            'description' => 'Conoce las aplicaciones más efectivas para facilitar el estudio.',
            'content' => 'Las aplicaciones pueden ser grandes aliadas en el estudio. Aquí están las mejores...',
            'image_url' => 'url_del_imagen_5.jpg',
            'published' => true,
            'category_id' => $category1->id,
        ]);

        Post::create([
            'title' => 'Alimentos que refuerzan el sistema inmunológico',
            'slug' => 'alimentos-sistema-inmunologico',
            'description' => 'Descubre qué alimentos ayudan a fortalecer tu salud.',
            'content' => 'Una dieta equilibrada es esencial para mantener un buen sistema inmunológico...',
            'image_url' => 'url_del_imagen_6.jpg',
            'published' => true,
            'category_id' => $category2->id,
        ]);

        Post::create([
            'title' => 'Los destinos más populares para viajar',
            'slug' => 'destinos-populares-viajar',
            'description' => 'Explora los lugares más visitados por turistas en el mundo.',
            'content' => 'Cada año, millones de turistas eligen estos destinos para sus vacaciones...',
            'image_url' => 'url_del_imagen_7.jpg',
            'published' => true,
            'category_id' => $category1->id,
        ]);

        Post::create([
            'title' => 'Cómo mejorar tu rendimiento en el deporte',
            'slug' => 'mejorar-rendimiento-deportivo',
            'description' => 'Consejos para optimizar tu rendimiento en actividades deportivas.',
            'content' => 'El rendimiento deportivo puede ser mejorado a través de diversas estrategias...',
            'image_url' => 'url_del_imagen_8.jpg',
            'published' => true,
            'category_id' => $category2->id,
        ]);

        Post::create([
            'title' => 'Impacto de la tecnología en la educación',
            'slug' => 'impacto-tecnologia-educacion',
            'description' => 'Analizamos cómo la tecnología está transformando el aprendizaje.',
            'content' => 'La tecnología ha cambiado la forma en que aprendemos y enseñamos...',
            'image_url' => 'url_del_imagen_9.jpg',
            'published' => true,
            'category_id' => $category1->id,
        ]);

        Post::create([
            'title' => 'Ejercicios para mantenerte en forma en casa',
            'slug' => 'ejercicios-en-casa',
            'description' => 'Rutinas de ejercicios que puedes realizar desde la comodidad de tu hogar.',
            'content' => 'No necesitas un gimnasio para mantenerte en forma. Aquí tienes algunas ideas...',
            'image_url' => 'url_del_imagen_10.jpg',
            'published' => true,
            'category_id' => $category2->id,
        ]);

        Post::create([
            'title' => 'Las ventajas de aprender un nuevo idioma',
            'slug' => 'ventajas-aprender-idioma',
            'description' => 'Beneficios de aprender un segundo idioma en la vida cotidiana.',
            'content' => 'Aprender un nuevo idioma puede abrirte muchas puertas en tu vida personal y profesional...',
            'image_url' => 'url_del_imagen_11.jpg',
            'published' => true,
            'category_id' => $category1->id,
        ]);
    }
}
