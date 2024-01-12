<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => mt_rand(1,5),
            'review' => $this->faker->sentence(mt_rand(2, 20)),
            'user_id' => mt_rand(2, 5),
            'menu_id' => mt_rand(1, 30)
        ];
    }
}
