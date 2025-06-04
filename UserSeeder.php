<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Admin',
            'apellidos' => 'Fluxis',
            'email' => 'admin@fluxis.com',
            'password' => Hash::make('password'),
            'rol' => 'Admin',
            'extension_telefono' => '1001',
            'foto_perfil' => null,
        ]);

        User::create([
            'nombre' => 'RRHH',
            'apellidos' => 'User',
            'email' => 'rrhh@fluxis.com',
            'password' => Hash::make('password'),
            'rol' => 'RRHH',
            'extension_telefono' => '1002',
            'foto_perfil' => null,
        ]);

        User::create([
            'nombre' => 'Sistemas',
            'apellidos' => 'User',
            'email' => 'sistemas@fluxis.com',
            'password' => Hash::make('password'),
            'rol' => 'Sistemas',
            'extension_telefono' => '1003',
            'foto_perfil' => null,
        ]);

        User::create([
            'nombre' => 'Jefe',
            'apellidos' => 'User',
            'email' => 'jefe@fluxis.com',
            'password' => Hash::make('password'),
            'rol' => 'Jefe',
            'extension_telefono' => '1004',
            'foto_perfil' => null,
        ]);
    }
}