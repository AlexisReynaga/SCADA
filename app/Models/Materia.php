<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $primaryKey = 'id_clave';

    public $incrementing = false;
    protected $keyType = 'int'; 

    public $timestamps = true;

    protected $fillable = [
        'id_clave', 
        'nombre', 
        'creditos', 
        'carrera', 
        'total_horas', 
        'horas_teoria', 
        'horas_practica', 
        'horas_autonomas'
    ];

    // Relación con Temas
    public function temas()
    {
        return $this->hasMany(Tema::class, 'fk_clave', 'id_clave');
    }

    // Relación con Grupos
    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'fk_id_materia', 'id_clave');
    }
}
