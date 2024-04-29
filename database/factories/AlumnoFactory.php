<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    private function get_dni():string
    {
        $number = fake()->numberBetween(100000000, 999999999);
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letra = $letras[$number%23];
        return "$number-$letra";
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre"=>fake()->name(),
            "email"=>fake()->email(),
            "edad"=>fake()->numberBetween(15,60),
            "dni"=> $this->get_dni(),
        ];
    }
}
