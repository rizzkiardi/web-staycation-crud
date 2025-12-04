<?php

namespace Database\Factories;

use App\Models\Category;
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
        $categoryName = $this->faker->randomElement(['Hotel', 'Resort', 'Villa']);
        $category = Category::where('name', $categoryName)->first();
        return [
            'name' => $this->faker->company . ' ' . $categoryName,
            'image' => $this->faker->imageUrl(640, 480, 'hotel', true),
            'location' => $this->faker->city,
            'price' => $this->faker->numberBetween(300000, 3000000),
            'category_id' => $category?->id,
        ];

        // $categoryName = $this->faker->randomElement(['Hotel', 'Resort', 'Villa']);
        // $category = Category::whereRaw('LOWER(name) = ?', [strtolower($categoryName)])->first();
        // return [
        //     'name'        => $this->faker->company . ' ' . $categoryName,
        //     'image'       => $this->faker->imageUrl(640, 480, 'hotel', true),
        //     'location'    => $this->faker->city,
        //     'price'       => $this->faker->numberBetween(300000, 3000000),
        //     'category_id' => $category?->id,
        // ];
    }
}
