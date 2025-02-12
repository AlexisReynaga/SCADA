<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Asegúrate de importar el modelo User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['correo' => 'juan.perez@email.com'], // Evita duplicados basándose en el correo
            [
                'nombres' => 'Juan',
                'apellidos' => 'Pérez',
                'password' => Hash::make('123456'),
                'materias_impartidas' => json_encode(['Matemáticas', 'Física']),
                'institucion' => 'UASLP',
                'numero_celular' => '4441234567',
                'rol' => 'docente',
            ]
        );

        User::updateOrCreate(
            ['correo' => 'maria.lopez@email.com'],
            [
                'nombres' => 'María',
                'apellidos' => 'López',
                'password' => Hash::make('abcdef'),
                'materias_impartidas' => json_encode(['Química', 'Estructura de Datos']),
                'institucion' => 'UASLP',
                'numero_celular' => '4447654321',
                'rol' => 'admin',
            ]
        );
    }
}
