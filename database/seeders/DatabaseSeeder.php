<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Finca;
use App\Models\Ganado;
use App\Models\Hierro;
use App\Models\Incidente;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear 12 fincas
        Finca::factory()->times(12)->create();

        // Crear 8 usuarios y asignarles 2 fincas aleatorias
        Usuario::factory()->times(8)->create()->each(function ($usuario) {
            $usuario->fincas()->sync(
                Finca::all()->random(2) // Relación muchos a muchos
            );
        });

        // Crear 3 hierros
        Hierro::factory()->times(3)->create();

        // Crear 20 ganados y asignarles un hierro y una finca aleatorios (relación uno a muchos)
        Ganado::factory()->times(20)->create()->each(function ($ganado) {
            $ganado->finca_id = Finca::all()->random()->id; // Asignar finca_id
            $ganado->hierro_id = Hierro::all()->random()->id; // Asignar hierro_id
            $ganado->save();
        });

        // Crear 5 incidentes y asignarles 2 ganados aleatorios
        Incidente::factory()->times(5)->create()->each(function ($incidente) {
            $incidente->ganados()->sync(
                Ganado::all()->random(2) // Relación muchos a muchos con ganados
            );
        });
    }
}