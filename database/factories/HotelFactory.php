<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = $this->faker->randomElement(['Hotel', 'Resort', 'Villa']);
        return [
            'name' => $this->faker->company . ' ' . ucfirst($category),
            'image' => $this->faker->imageUrl(640, 480, 'hotel', true),
            'location' => $this->faker->city,
            'price' => $this->faker->numberBetween(300000, 3000000),
            'category' => $this->faker->randomElement(['hotel', 'resort', 'villa']),
        ];
    }
}
