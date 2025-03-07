<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model {
    use HasFactory;

    protected $table = 'grupos';
    protected $primaryKey = 'id_grupo';
    public $incrementing = false;
    // Dependiendo del tipo (string o entero) puedes ajustar keyType; 
    // por ejemplo, si es string: protected $keyType = 'string';
    // Si es entero, se puede dejar sin definir.
    protected $fillable = ['id_grupo', 'fk_id_materia', 'nombre_grupo', 'horario', 'capacidad'];
    // Relación con Materia
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'fk_id_materia', 'id_clave');
    }

    // Relación con GrupoUsuario (para obtener los usuarios inscritos)
    public function grupoUsuarios()
    {
        return $this->hasMany(GrupoUsuario::class, 'fk_id_grupo', 'id_grupo');
    }
}
