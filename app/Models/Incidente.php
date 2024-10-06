<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    use HasFactory;
    public $table = "incidentes";
    protected $fillable = [
        "tipo",
        "descripcion"
    ];

    public function ganados()
    {
        return $this->belongsToMany(Ganado::class, 'ganado_incidente');
    }
}
