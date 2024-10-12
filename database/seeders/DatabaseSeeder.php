<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comic;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Category::factory(10)->create();
        //Comic::factory(20)->create();
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>bcrypt('12345678')
        ]);
    
        $this->call([
            AuthorSeeder::class,
            CategorySeeder::class,
            ComicSeeder::class
        ]);
    }
}
