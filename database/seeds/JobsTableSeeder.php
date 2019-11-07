<?php

use App\Job;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'title' => 'Web Design Project',
            'description' => 'some lame ass description',
            'budget' => '1200',
            'position_type' => 'part-time',
            'project_duration' => 'Less than 1 month',
            'category_id' => 2,
            'user_id' => 3
        ]);

        Job::create([
            'title' => 'Graphics Design',
            'description' => 'G for g-birds bitches!!',
            'budget' => '1000',
            'position_type' => 'full-time',
            'project_duration' => '3 - 6 months',
            'category_id' => 1,
            'user_id' => 3
        ]);

        Job::create([
            'title' => 'Data entry',
            'description' => 'Data is money niggas !!',
            'budget' => '2900',
            'position_type' => 'part-time',
            'project_duration' => 'Less than 1 week',
            'category_id' => 1,
            'user_id' => 3
        ]);


        Job::create([
            'title' => 'System Design',
            'description' => 'system design is love!',
            'budget' => '8000',
            'position_type' => 'full-time',
            'project_duration' => '3 - 6 months',
            'category_id' => 3,
            'user_id' => 3
        ]);
    }
}
