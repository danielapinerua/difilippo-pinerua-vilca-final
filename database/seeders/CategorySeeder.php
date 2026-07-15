<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Snacks'],
            ['name' => 'Dulces'],
            ['name' => 'Salados'],
            ['name' => 'Harinas'],
            ['name' => 'Congelados'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
