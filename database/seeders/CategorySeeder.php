<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Hotel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Resort', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Villa', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
