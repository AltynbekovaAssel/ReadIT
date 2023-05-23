<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'body' => fake()->text() . fake()->text() . fake()->text() . fake()->text() . fake()->text(),
            'image' => fake()->imageUrl(110, 160),
            'url' => 'https://www.adobe.com/support/products/enterprise/knowledgecenter/media/c4611_sample_explain.pdf',
            'category_id' => fake()->numberBetween(1, 10),
            'author' => fake()->userName(),
            'count' => 3,
        ];
    }
}
