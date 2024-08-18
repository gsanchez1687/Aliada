<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();

        $this->call([
            // State_municipalities_mexico_seeder::class,
            // CategorySeeder::class,
            // TypePropertySeeder::class,
            // TransactionStatusSeeder::class,
            // AmenitiesSeeder::class,
            // ViewsTableSeeder::class,
            // LabelsSeeder::class,
            // RoleSeeder::class,
             UsersWithRolesSeeder::class,
            // TypologiesSeeder::class,
            // PropertyTypologySeeder::class,
            // ApprovalStatesSeeder::class,
        ]);
    }
}
