<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BabakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        DB::table('babaks')->insert([
            'name' => 'Babak Pertama'
        ]);
        DB::table('babaks')->insert([
            'name' => 'Babak Kedua'
        ]);
        DB::table('babaks')->insert([
            'name' => 'Fase Grup'
        ]);
        DB::table('babaks')->insert([
            'name' => '16 Besar'
        ]);
        DB::table('babaks')->insert([
            'name' => 'Quarter Final'
        ]);
        DB::table('babaks')->insert([
            'name' => 'Semi Final'
        ]);
        DB::table('babaks')->insert([
            'name' => 'Perebutan Tempat 3'
        ]);
        DB::table('babaks')->insert([
            'name' => 'Final'
        ]);
    }
}
