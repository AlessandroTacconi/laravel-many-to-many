<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Frontend', 'Backend', 'Full Stack'];

        foreach ($categories as $category) {
            
            $new_category = new Category();

            $new_category->title = $category;
            $new_category->slug = Str::of($category)->slug('-');

            $new_category->save();
        }

    }
}
