<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::create(['name' => 'Companhia das Letras', 'address' => 'São Paulo, SP, Brasil']);
        Publisher::create(['name' => 'Editora Record', 'address' => 'Rio de Janeiro, RJ, Brasil']);
        Publisher::create(['name' => 'HarperCollins Brasil', 'address' => 'São Paulo, SP, Brasil']);
        Publisher::create(['name' => 'Rocco', 'address' => 'Rio de Janeiro, RJ, Brasil']);
        Publisher::create(['name' => 'DarkSide Books', 'address' => 'São Paulo, SP, Brasil']);
    }
}
