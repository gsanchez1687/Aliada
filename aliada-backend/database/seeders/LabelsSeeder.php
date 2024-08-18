<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\LabelCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Obtén las categorías 'venta' y 'renta'
       $ventaCategory = Category::where('name', 'Venta')->first();
       $rentaCategory = Category::where('name', 'Renta')->first();

       // Crea los registros de labels para la categoría 'venta'
       $labelsVenta = [
           'Preventa',
           'Entrega Inmediata',
           'Vendido',
       ];

       foreach ($labelsVenta as $label) {
           LabelCategory::create([
               'name' => $label,
               'category_id' => $ventaCategory->id,
           ]);
       }

       // Crea los registros de labels para la categoría 'renta'
       $labelsRenta = [
           'Disponible',
           'No disponible',
       ];

       foreach ($labelsRenta as $label) {
           LabelCategory::create([
               'name' => $label,
               'category_id' => $rentaCategory->id,
           ]);
       }
    }
}
