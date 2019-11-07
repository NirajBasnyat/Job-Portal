<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
           'role_name' => 'Job Seeker' //id =1
        ]);

        Role::create([
            'role_name' => 'Job Provider' //id = 2
        ]);
    }
}
