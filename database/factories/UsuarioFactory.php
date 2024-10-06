<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre_usuario" => $this->faker->name(),
            "password" => $this->faker->sentence(1),
            "rol" => $this->faker->boolean(),
            "nombre" => $this->faker->name(1),
            "apellido" => $this->faker->name(1)
        ];
    }
}
