<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\T_food>
 */
class T_foodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mang = ['Hoa quả', 'Thực phẩm khô', 'rau hữu cơ'];
        return [
            'Type' => $this->faker->unique()->randomElement($mang)
        ];
    }
}
