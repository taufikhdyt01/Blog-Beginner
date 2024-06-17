<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Artikel'],
            ['name' => 'Tutorial'],
            ['name' => 'Pendapat'],
            ['name' => 'Review'],
            ['name' => 'Tips'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

