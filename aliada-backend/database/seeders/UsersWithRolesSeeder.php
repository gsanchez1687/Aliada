<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersWithRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuarios aliado
        $aliadoRole = Role::where('name', 'aliado')->first();
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => 'Aliado '.$i,
                'email' => 'aliado'.$i.'@example.com',
                'password' => bcrypt('password'),
            ]);
            $user->assignRole($aliadoRole);
        }

        // Crear usuarios team leader
        $teamLeaderRole = Role::where('name', 'team leader')->first();
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => 'Team Leader '.$i,
                'email' => 'teamleader'.$i.'@example.com',
                'password' => bcrypt('password'),
            ]);
            $user->assignRole($teamLeaderRole);
        }

        // Crear usuarios mentor
        $mentorRole = Role::where('name', 'mentor')->first();
        for ($i = 1; $i <= 4; $i++) {
            $user = User::create([
                'name' => 'Mentor '.$i,
                'email' => 'mentor'.$i.'@example.com',
                'password' => bcrypt('password'),
            ]);
            $user->assignRole($mentorRole);
        }
        $adminRole = Role::where('name', 'admin')->first();
        for ($i = 1; $i <= 2; $i++) {
            $user = User::create([
                'name' => 'Admin '.$i,
                'email' => 'admin'.$i.'@example.com',
                'password' => bcrypt('password'),
            ]);
            $user->assignRole($adminRole);
        }
    }
}
