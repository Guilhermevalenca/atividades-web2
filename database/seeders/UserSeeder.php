<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'name' => 'Guilherme',
                'email' => 'gui@gmail.com',
                'email_verified_at' => now(),
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]);
        User::factory(20)->create();
    }
}
