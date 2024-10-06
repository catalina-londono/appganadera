<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganado extends Model
{
    use HasFactory;
    public $table = "ganados";
    protected $fillable = [
        "sexo",
        "raza",
        "proposito",
        "tipo",
        "foto",
        'finca_id',
        'hierro_id'
    ];

    public function fincas()
    {
        return $this->belongsTo(Finca::class, 'fincas');
    }

    public function hierros()
    {
        return $this->belongsTo(Hierro::class, 'hierros');
    }

    public function incidentes()
    {
        return $this->belongsToMany(Incidente::class, 'ganado_incidente');
    }
}
