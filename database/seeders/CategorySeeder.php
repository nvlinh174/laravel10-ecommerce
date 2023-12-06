<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Root',
            'description' => 'root',
            'slug' => 'root',
            'meta_title' => 'root',
            'meta_description' => 'root',
            'meta_keywords' => 'root',
            'status' => 1,
        ]);
    }
}
