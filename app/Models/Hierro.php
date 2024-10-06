<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hierro extends Model
{
    use HasFactory;
    public $table = "hierros";
    protected $fillable = [
        "material",
        "marcado"
    ];

    public function ganados()
    {

        return $this->hasMany(Ganado::class, "ganados");
    }
}
