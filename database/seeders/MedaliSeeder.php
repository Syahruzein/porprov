<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('medalis')->insert([
            'name' => 'Emas'
        ]);
        DB::table('medalis')->insert([
            'name' => 'Perak'
        ]);
        DB::table('medalis')->insert([
            'name' => 'Perunggu'
        ]);
    }
}
