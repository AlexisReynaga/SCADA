<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';

    protected $primaryKey = 'id_clave';

    public $timestamps = true;

    protected $fillable = ['nombre', 'creditos', 'carrera', 'total_horas', 'horas_teoria', 'horas_practica', 'horas_autonomas'];

    // Relación con Temas
    public function temas()
    {
        return $this->hasMany(Tema::class, 'fk_clave', 'id_clave');
    }
}
