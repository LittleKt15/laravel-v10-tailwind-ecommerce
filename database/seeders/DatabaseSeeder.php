<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'kzt',
            'email' => 'kzt@gmail.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
        ]);

        Category::create([
            'name' => 'T-Shirt',
        ]);

        Category::create([
            'name' => 'Polo Shirt',
        ]);

        Category::create([
            'name' => 'Sleeveless Shirt',
        ]);

        Category::create([
            'name' => 'Hoodie',
        ]);

        Category::create([
            'name' => 'Dress Shirt',
        ]);
    }
}
