<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comic;
use App\Models\Author;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comic::class;

    public function definition(): array
    {
        // Obtén un conjunto específico de IDs de categorías
        //$categoryIds = Category::pluck('id')->take(8)->toArray(); // Limitar a 5 categorías

        return [
            'title'=>$this->faker->sentence(),
            'author_id' => Author::factory(),
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
