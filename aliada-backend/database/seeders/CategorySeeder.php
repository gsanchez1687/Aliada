<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Venta'],
            ['name' => 'Renta']
        ];

        foreach ($categories as $categoryData) {
            $categoryData['slug'] = \Illuminate\Support\Str::slug($categoryData['name']);
            Category::create($categoryData);
        }
    }
}
