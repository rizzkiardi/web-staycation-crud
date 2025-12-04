<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Category;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hotel::factory()->count(99)->create();
        Hotel::factory(20)->create([
            'category_id' => Category::inRandomOrder()->first()->id,
        ]);
    }
}
