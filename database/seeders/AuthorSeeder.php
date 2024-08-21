<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Pest\Laravel\instance;
use App\Models\Book;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()->createMany([
            // Autores brasileiros
            [
                'name' => 'Machado de Assis',
                'birth_date' => '1839-06-21'
            ],
            [
                'name' => 'Clarice Lispector',
                'birth_date' => '1920-12-10'
            ],
            [
                'name' => 'Jorge Amado',
                'birth_date' => '1912-08-10'
            ],
            [
                'name' => 'Paulo Coelho',
                'birth_date' => '1947-08-24'
            ],
            // Autores de Cultura Pop Estrangeira
            [
                'name' => 'J.K. Rowling',
                'birth_date' => '1965-07-31'
            ],
            [
                'name' => 'George Orwell',
                'birth_date' => '1903-06-25'
            ],
            [
                'name' => 'J.R.R. Tolkien',
                'birth_date' => '1892-01-03'
            ]
        ]);
    }
}
