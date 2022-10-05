<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('students')->insert([
                'ad' => 'Recep',
                'soyad' => 'Çakır',
                'consultant_id' => '1', 
                'numarasi' => '191307002',
                'fakulte' => 'Teknoloji',
                'bolum' => 'Bilişim',
                'sinif' => '3',
                'fotograf' => 'null',
                'telefon' => '05349220061',
                'email' => '191307002@kocaeli.edu.tr',
                'created_at' => Now(),
                'updated_at' => Now(),
            ]);
        
    }
}
