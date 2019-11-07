<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Skill::create([
           'name' => 'Laravel'
        ]);
        \App\Skill::create([
            'name' => 'PHP'
        ]);
        \App\Skill::create([
            'name' => 'Python'
        ]);
        \App\Skill::create([
            'name' => 'SEO'
        ]);
        \App\Skill::create([
            'name' => 'HTML'
        ]);
        \App\Skill::create([
            'name' => 'CSS'
        ]);
        \App\Skill::create([
            'name' => 'SQL'
        ]);
        \App\Skill::create([
            'name' => 'Photoshop'
        ]);
    }
}
