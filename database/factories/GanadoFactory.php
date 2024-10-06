<?php

namespace Database\Factories;

use App\Models\Finca;
use App\Models\Hierro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ganado>
 */
class GanadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "sexo" => $this->faker->boolean(),
            "raza" => $this->faker->sentence(1),
            "proposito" => $this->faker->randomNumber(1, 3),
            "tipo" => $this->faker->randomNumber(1, 3),
            "foto" => $this->faker->sentence(),
            'finca_id' => Finca::all()->random()->id,
            'hierro_id' => Hierro::all()->random()->id,
        ];
    }
}
