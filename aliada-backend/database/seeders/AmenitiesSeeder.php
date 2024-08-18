<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            'bodega' => 'fas fa-store-alt',
            'kitchen' => 'fas fa-utensils',
            'maid_room' => 'fas fa-bed',
            'security' => 'fas fa-shield-alt',
            'elevator' => 'fas fa-caret-square-up',
            'parking' => 'fas fa-parking',
            'study' => 'fas fa-book',
            'terrace' => 'fas fa-umbrella-beach',
            'pool' => 'fas fa-swimming-pool',
            'rooftop' => 'fas fa-building',
            'jacuzzi' => 'fas fa-hot-tub',
            'solar_panels' => 'fas fa-sun',
            'bar' => 'fas fa-cocktail',
            'restaurant' => 'fas fa-utensils',
            'game_room' => 'fas fa-gamepad',
            'cinema' => 'fas fa-film',
            'furnished' => 'fas fa-couch',
            'equipped' => 'fas fa-wrench',
            'gym' => 'fas fa-dumbbell',
            'spa' => 'fas fa-spa',
            'yoga_area' => 'fas fa-praying-hands',
            'coworking' => 'fas fa-laptop',
            'visitor_parking' => 'fas fa-car',
            'laundry' => 'fas fa-tshirt',
            'grill' => 'fas fa-fire',
        ];

        foreach ($amenities as $name => $icon) {
            DB::table('amenities')->insert([
                'name' => $name,
                'icon' => $icon,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
