<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
        public function run()
        {
            $statuses = [
                ['name' => 'pending', 'description' => 'Transacción pendiente de procesamiento'],
                ['name' => 'completed', 'description' => 'Transacción completada con éxito'],
                ['name' => 'failed', 'description' => 'Transacción fallida'],
            ];
    
            foreach ($statuses as $status) {
                TransactionStatus::create($status);
            }
        }
}
