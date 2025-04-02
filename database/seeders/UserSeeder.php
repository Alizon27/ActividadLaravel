<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alizon Cristina Melo Ramirez',  // Tu nombre completo
            'email' => 'alizoncris20@gmail.com',  // Tu correo electrónico
            'password' => Hash::make('chandler27005'),  // Contraseña cifrada
        ]);
    }
}
