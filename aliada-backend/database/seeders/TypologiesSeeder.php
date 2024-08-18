<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologiesData = [
            ['name' => 'Estudio'],
            ['name' => 'Penthouse'],
            ['name' => 'Duplex'],
            ['name' => 'Casa estándar'],
            ['name' => 'Villa'],
            ['name' => 'Townhouse'],
            ['name' => 'Bungalow'],
            ['name' => 'Terreno'],
            ['name' => 'Mixto'],
            ['name' => 'Comercial'],
            ['name' => 'Unifamiliar'],
            ['name' => 'Multifamiliar'],
        ];

        Typology::insert($typologiesData);
    }
}
