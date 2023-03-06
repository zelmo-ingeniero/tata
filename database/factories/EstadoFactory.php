<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;

class EstadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'textoStds' => $this->faker->paragraph(),
            'imagenStds' => url("https://via.placeholder.com/100x200.png"),
            'fechaCreacionStds' => now(),
            'usuario_id' => Usuario::factory(),
        ];
    }
}
