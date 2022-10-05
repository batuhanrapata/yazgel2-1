<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultants')->insert([
            'ad' => 'Serdar',
            'soyad' => 'Solak',
            'unvan' => 'Doç.Dr.',
            'email' => 'serdars@kocaeli.edu.tr',
            'created_at' => Now(),
            'updated_at' => Now(),
        ]);
    }
}
