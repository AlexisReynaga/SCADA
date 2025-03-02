<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $table = 'temas';
    protected $primaryKey = 'id_tema';
    public $timestamps = true;

    protected $fillable = ['fk_clave', 'n_tema', 'horas_tema', 'tema'];

    // Relación con Materia
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'fk_clave', 'id_clave');
    }

    // Relación con Subtemas
    public function subtemas()
    {
        return $this->hasMany(Subtema::class, 'fk_id_tema', 'id_tema');
    }
}
