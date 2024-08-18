<?php

namespace Database\Seeders;

use App\Models\Typology;
use App\Models\TypeProperty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyTypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asociar tipologías a los Departamentos
        $departmentTypologies = Typology::whereIn('name', ['Estudio', 'Penthouse', 'Duplex'])->get();
        $departmentTypeProperty = TypeProperty::where('name', 'Departamento')->first();
        $departmentTypeProperty->typologies()->attach($departmentTypologies);

        // Asociar tipologías a las Casas
        $houseTypologies = Typology::whereIn('name', ['Casa estándar', 'Villa', 'Townhouse', 'Bungalow'])->get();
        $houseTypeProperty = TypeProperty::where('name', 'Casa')->first();
        $houseTypeProperty->typologies()->attach($houseTypologies);

        // Asociar tipologías a los Terrenos
        $landTypologies = Typology::whereIn('name', ['Mixto', 'Comercial', 'Unifamiliar', 'Multifamiliar'])->get();
        $landTypeProperty = TypeProperty::where('name', 'Terreno')->first();
        $landTypeProperty->typologies()->attach($landTypologies);
    }
}
