<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comics')->insert([
            ['id' => 1, 'title' => 'The Last Adventure', 'path_image' => null, 'description' => 'An epic journey through unknown lands.', 'author_id' => 1, 'category_id' => 1, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 2, 'title' => 'Fantasy World Chronicles', 'path_image' => null, 'description' => 'A tale of magic and mythical creatures.', 'author_id' => 2, 'category_id' => 2, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 3, 'title' => 'Space Odyssey: Beyond Infinity', 'path_image' => null, 'description' => 'A thrilling adventure across the cosmos.', 'author_id' => 3, 'category_id' => 3, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 4, 'title' => 'The Haunting of Darkwood', 'path_image' => null, 'description' => 'A chilling story of ghosts and haunted woods.', 'author_id' => 4, 'category_id' => 4, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 5, 'title' => 'The Great Comedian', 'path_image' => null, 'description' => 'A story of laughter amidst life\'s struggles.', 'author_id' => 5, 'category_id' => 5, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 6, 'title' => 'Behind Closed Curtains', 'path_image' => null, 'description' => 'A dramatic tale of secrets and lies.', 'author_id' => 6, 'category_id' => 6, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 7, 'title' => 'Edge of Fear', 'path_image' => null, 'description' => 'A suspense-filled thriller.', 'author_id' => 7, 'category_id' => 7, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 8, 'title' => 'Love in the Time of Chaos', 'path_image' => null, 'description' => 'A love story set in turbulent times.', 'author_id' => 8, 'category_id' => 8, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 9, 'title' => 'Mystery of the Forgotten Tomb', 'path_image' => null, 'description' => 'An ancient mystery waiting to be solved.', 'author_id' => 9, 'category_id' => 9, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
            ['id' => 10, 'title' => 'The Rise of Supernova', 'path_image' => null, 'description' => 'A superhero origin story like no other.', 'author_id' => 10, 'category_id' => 10, 'created_at' => '2024-10-01 22:00:00', 'updated_at' => '2024-10-01 22:00:00'],
        ]);
    }
}
