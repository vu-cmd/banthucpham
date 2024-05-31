<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listfood>
 */
class ListfoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image'=>'images/food'.rand(1,8).'.jpg',
            'name' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            // 'description' => fake()->asciify('user-****'),
            'price' => fake()->numberBetween(0, 999999999),
            'produced_on' => now(),
            'Tfood_id'=>rand(1,3),
            'description' => fake()->numerify('user-####'),
        ];
    }
}
