<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //esto lo utiliza el sembrador
        return [
            'nombreCompletoUsr' => $this->faker->name(),
            'fechaNacimientoUsr' => $this->faker->date('Y-m-d'),
            'user_id' => User::factory()
        ];
    }
}
