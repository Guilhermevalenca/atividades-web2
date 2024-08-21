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
    public function run(): void
    {
        $categories = [
            'Ficção',
            'Não-ficção',
            'Fantasia',
            'Ciência',
            'Biografia',
            'História',
            'Tecnologia',
            'Arte',
            'Viagem',
            'Romance',
            'Ficção Científica',
            'Ficção Brasileira',
            'Clássico',
            'Suspense'
        ];
        $data = array_map(fn($category) => ['name' => $category], $categories);
        Category::factory()->createMany($data);
    }
}
