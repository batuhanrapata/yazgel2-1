<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'     => 'Admin',
            'email'    => 'admin@localhost.com',
            'role'    => 'admin',
            'password' => bcrypt('123'),
        ]);
    
        Admin::create([
            'name'     => 'Consultant',
            'email'    => 'consultant@localhost.com',
            'role'    => 'consultant',
            'password' => bcrypt('1234'),
        ]);
    
        Admin::create([
            'name'     => 'Student',
            'email'    => 'student@localhost.com',
            'role'    => 'student',
            'password' => bcrypt('12345'),
        ]);
    }
}
