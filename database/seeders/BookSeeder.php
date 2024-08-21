<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()->createMany([
            [
                'title' => 'Dom Casmurro',
                'author_id' => 1, // Machado de Assis
                'publisher_id' => 1, // Companhia das Letras
                'published_year' => 1899
            ],
            [
                'title' => 'A Hora da Estrela',
                'author_id' => 2, // Clarice Lispector
                'publisher_id' => 2, // Editora Record
                'published_year' => 1977
            ],
            [
                'title' => 'Capitães da Areia',
                'author_id' => 3, // Jorge Amado
                'publisher_id' => 2, // Editora Record
                'published_year' => 1937
            ],
            [
                'title' => 'O Alquimista',
                'author_id' => 4, // Paulo Coelho
                'publisher_id' => 3, // HarperCollins Brasil
                'published_year' => 1988
            ],
            [
                'title' => 'Harry Potter e a Pedra Filosofal',
                'author_id' => 5, // J.K. Rowling
                'publisher_id' => 4, // Rocco
                'published_year' => 1997
            ],
            [
                'title' => '1984',
                'author_id' => 6, // George Orwell
                'publisher_id' => 3, // HarperCollins Brasil
                'published_year' => 1949
            ],
            [
                'title' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'author_id' => 7, // J.R.R. Tolkien
                'publisher_id' => 5, // DarkSide Books
                'published_year' => 1954
            ]
        ]);

    }
}
