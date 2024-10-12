<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            ['id' => 1, 'name' => 'Lara Kuhic', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 2, 'name' => 'Dewitt Balistreri', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 3, 'name' => 'Lacy Hilpert', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 4, 'name' => 'Marvin Cummings', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 5, 'name' => 'Giovanna Bruen', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 6, 'name' => 'Dorian Grimes', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 7, 'name' => 'Bennett Nikolaus', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 8, 'name' => 'Sherman Fadel', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 9, 'name' => 'Anibal Waters', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 10, 'name' => 'Brigitte Steuber', 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
        ]);
    }
}
