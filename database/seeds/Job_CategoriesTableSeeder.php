<?php

use App\JobCategory;
use Illuminate\Database\Seeder;

class Job_CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCategory::create([
            'category_name' => 'Graphics & Design'
        ]);

        JobCategory::create([
            'category_name' => 'Programming & Tech'
        ]);

        JobCategory::create([
            'category_name' => 'Digital Marketing'
        ]);

        JobCategory::create([
            'category_name' => 'Writing & Translation'
        ]);

        JobCategory::create([
            'category_name' => 'Video & Animation'
        ]);

        JobCategory::create([
            'category_name' => 'Admin Support'
        ]);

        JobCategory::create([
            'category_name' => 'Architecture & Engineering'
        ]);

        JobCategory::create([
            'category_name' => 'Management & Finance'
        ]);

    }
}
