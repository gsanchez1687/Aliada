<?php

namespace Database\Seeders;

use App\Models\TypeProperty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypePropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Casa'],
            ['name' => 'Departamento'],
            ['name' => 'Terreno']
        ];

        foreach ($types as $typeData) {
            $typeData['slug'] = \Illuminate\Support\Str::slug($typeData['name']);
            TypeProperty::create($typeData);
        }
    }
}
