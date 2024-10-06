<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public $table = "usuarios";
    protected $fillable = [
        "nombre_usuario",
        "password",
        "rol",
        "nombre",
        "apellido"
    ];

    public function fincas()
    {

        return $this->belongsToMany(Finca::class, "finca_usuario");
    }
}
