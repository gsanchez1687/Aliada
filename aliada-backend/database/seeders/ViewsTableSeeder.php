<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('views')->insert([
            ['name' => 'Interior', 'description' => 'Vista del interior del establecimiento.'],
            ['name' => 'Street', 'description' => 'Vista de la calle y alrededores.'],
            ['name' => 'Sea', 'description' => 'Hermosa vista al mar.'],
            ['name' => 'Jungle', 'description' => 'Vista a la selva o zona verde.'],
        ]);
    }
}
