<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model {
    use HasFactory;

    protected $table = 'grupo_usuario';
    protected $primaryKey = 'id_usuario_grupo';
    protected $fillable = ['fk_clave_maestro', 'fk_id_grupo', 'fecha_inscripcion', 'estado'];
}
