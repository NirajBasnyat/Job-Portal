<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'admin' => 1,
           'email_verified_at' => \Carbon\Carbon::now(),
           'password' => bcrypt('admin123')
        ]);

        App\User::create([
            'name' => 'Job Seeker',
            'email' => 'seeker@mail.com',
            'role' => 1,
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password')
        ]);

        App\User::create([
            'name' => 'Job Provider',
            'email' => 'provider@mail.com',
            'role' => 2,
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password')
        ]);
    }
}
