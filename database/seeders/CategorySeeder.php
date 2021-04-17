<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::create([
            'description' => 'Area de sistemas',
        ]);

        $categories = Category::create([
            'description' => 'Area de desarrollo',
        ]);

        $categories = Category::create([
            'description' => 'Area de redes',
        ]);

        $categories = Category::create([
            'description' => 'Area de marketing',
        ]);

        $categories = Category::create([
            'description' => 'Area de bases de datos',
        ]);

        $categories = Category::create([
            'description' => 'Area de analisis de datos',
        ]);

        $categories = Category::create([
            'description' => 'Area de inteligencia artificial',
        ]);

        $categories = Category::create([
            'description' => 'Area de maching learning',
        ]);

        $categories = Category::create([
            'description' => 'Area de electronica',
        ]);

        $categories = Category::create([
            'description' => 'Area de testing',
        ]);
    }
}
