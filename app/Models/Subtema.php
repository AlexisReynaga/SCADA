<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtema extends Model
{
    use HasFactory;

    protected $table = 'subtemas';
    protected $primaryKey = 'id_n_sub';
    public $timestamps = true;

    protected $fillable = ['fk_id_tema', 'subtema'];

    // Relación con Tema
    public function tema()
    {
        return $this->belongsTo(Tema::class, 'fk_id_tema', 'id_tema');
    }
}
