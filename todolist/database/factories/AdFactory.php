<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/*
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=PhotoSeeder
php artisan db:seed --class=ConditionSeeder
php artisan db:seed --class=LocationSeeder
php artisan db:seed --class=CategorieSeeder
php artisan db:seed --class=AdSeeder
 */

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->word(),
            'description' => fake()->paragraph(2),
            'image' => fake()->imageUrl(),
            'price' => fake()->randomNumber(5, false),
            'user_id'=>fake()->randomDigitNotNull(),
            'condition_id' => fake()->randomDigitNotNull(),
            'location_id' => fake()->randomDigitNotNull(),
            'categorie_id' => fake()->randomDigitNotNull(),
            'created_at'=>fake()->dateTimeBetween('-1 year'),
            'updated_at'=>fake()->dateTimeBetween('-1 year')
        ];
    }
}
