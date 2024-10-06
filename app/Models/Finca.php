<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    use HasFactory;
    public $table = "fincas";
    protected $fillable = [
        "nombre",
        "ubicacion",
    ];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, "finca_usuario");
    }

    public function ganados(){
        return $this->hasMany(Ganado::class, "ganados");
    }
}
