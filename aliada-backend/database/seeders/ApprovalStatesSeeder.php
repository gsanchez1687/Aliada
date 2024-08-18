<?php

namespace Database\Seeders;

use App\Models\ApprovalState;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApprovalStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statesData = [
            ['name' => 'Pendiente'],
            ['name' => 'Aprobado'],
            ['name' => 'Rechazado'],
        ];

        ApprovalState::insert($statesData);
    }
}
