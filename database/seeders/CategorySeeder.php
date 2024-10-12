<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Adventure', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 2, 'name' => 'Fantasy', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 3, 'name' => 'Science Fiction', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 4, 'name' => 'Horror', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 5, 'name' => 'Comedy', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 6, 'name' => 'Drama', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 7, 'name' => 'Thriller', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 8, 'name' => 'Romance', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 9, 'name' => 'Mystery', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 10, 'name' => 'Superhero', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
        ]);
    }
}
