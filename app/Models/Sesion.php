<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $table = 'sesiones';

    protected $fillable = [
        'id_grupo',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'titulo_actividad',
        'tema',
        'subtema',
        'actividades',
        'enlaces',
        'archivo',
        'estado',
    ];
}