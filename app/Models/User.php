<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    // Indicamos que la clave primaria es 'rpe'
    protected $primaryKey = 'rpe';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'rpe',
        'nombres',
        'apellidos',
        'correo',
        'materias_impartidas',
        'institucion',
        'numero_celular',
        'rol',
    ];

    protected $casts = [
        'materias_impartidas' => 'array', // Convierte JSON a array automáticamente
    ];

    // Ya no es necesario ocultar la contraseña (porque no se usa)
    protected $hidden = [
        // 'password'
    ];
}
