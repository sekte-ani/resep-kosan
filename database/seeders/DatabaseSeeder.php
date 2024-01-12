<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Rate;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Menu::factory(30)->create();


        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('adminkopral098'),
            'role' => 'admin'
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Makanan'
        ]);
        Category::create([
            'name' => 'Minuman'
        ]);
        Category::create([
            'name' => 'Cemilan'
        ]);

        Rate::factory(100)->create();
    }
}
