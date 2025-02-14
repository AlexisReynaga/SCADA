<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'password',
        'materias_impartidas',
        'institucion',
        'numero_celular',
        'rol',
    ];

    protected $casts = [
        'materias_impartidas' => 'array', // Convierte JSON a array automáticamente
    ];

    protected $hidden = [
        'password',
    ];
}
