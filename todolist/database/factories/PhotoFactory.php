<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uriPicture' => fake()->imageUrl(),
            'created_at'=>fake()->dateTimeBetween('-1 year'),
            'updated_at'=>fake()->dateTimeBetween('-1 year')
        ];
    }
}
