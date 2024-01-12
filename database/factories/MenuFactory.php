<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'desc' => collect($this->faker->paragraphs(mt_rand(3,10)))
                        ->map(fn($p)=> "<p>$p</p>")
                        ->implode(''),
            'img' => 'kosong.png',
            'category_id' => mt_rand(1, 3)
        ];
    }
}
