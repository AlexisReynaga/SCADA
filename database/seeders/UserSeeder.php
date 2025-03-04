<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de importar el modelo User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario: RAMOS BLANCO ALBERTO (RPE 10285)
        User::updateOrCreate(
            ['rpe' => '10285'], // RPE único para este usuario
            [
                'nombres'           => 'Alberto',
                'apellidos'         => 'Ramos Blanco',
                'correo'            => 'beto@uaslp.com',
                'materias_impartidas' => json_encode([]),
                'institucion'       => 'UASLP',
                'numero_celular'    => '', // Puedes actualizarlo cuando tengas el dato
                'rol'               => 'admin',
            ]
        );

        // Usuario: Juan Pérez
        User::updateOrCreate(
            ['rpe' => '10001'], // RPE único para el usuario
            [
                'nombres'           => 'Juan',
                'apellidos'         => 'Pérez',
                'correo'            => 'juan.perez@email.com',
                'materias_impartidas' => json_encode(['Matemáticas', 'Física']),
                'institucion'       => 'UASLP',
                'numero_celular'    => '4441234567',
                'rol'               => 'docente',
            ]
        );

        // Usuario: María López
        User::updateOrCreate(
            ['rpe' => '10002'],
            [
                'nombres'           => 'María',
                'apellidos'         => 'López',
                'correo'            => 'maria.lopez@email.com',
                'materias_impartidas' => json_encode(['Química', 'Estructura de Datos']),
                'institucion'       => 'UASLP',
                'numero_celular'    => '4447654321',
                'rol'               => 'admin',
            ]
        );

        // Usuario: Luis Felipe Rodríguez
        User::updateOrCreate(
            ['rpe' => '10003'],
            [
                'nombres'           => 'Luis Felipe',
                'apellidos'         => 'Rodríguez',
                'correo'            => 'luisf@gmail.com',
                'materias_impartidas' => json_encode([]),
                'institucion'       => 'UASLP',
                'numero_celular'    => '1234567890',
                'rol'               => 'becario',
            ]
        );

        // Usuario: Dana Rodríguez
        User::updateOrCreate(
            ['rpe' => '10004'],
            [
                'nombres'           => 'Dana',
                'apellidos'         => 'Rodríguez',
                'correo'            => 'dana@gmail.com',
                'materias_impartidas' => json_encode([]),
                'institucion'       => 'UASLP',
                'numero_celular'    => '1234567890',
                'rol'               => 'coordinador_ISI',
            ]
        );

        // Usuario: Fernando Ruiz
        User::updateOrCreate(
            ['rpe' => '10005'],
            [
                'nombres'           => 'Fernando',
                'apellidos'         => 'Ruiz',
                'correo'            => 'fer@gmail.com',
                'materias_impartidas' => json_encode([]),
                'institucion'       => 'UASLP',
                'numero_celular'    => '1234567890',
                'rol'               => 'coordinador_COMP',
            ]
        );

        User::updateOrCreate(
            ['rpe' => '16131'],
            [
                'nombres'           => 'Alberto Salvador',
                'apellidos'         => 'Nuñez Varela',
                'correo'            => 'alberto@uaslp.mx',
                'materias_impartidas' => json_encode([]),
                'institucion'       => 'UASLP',
                'numero_celular'    => '1432561',
                'rol'               => 'docente',
            ]
        );
    }
}
