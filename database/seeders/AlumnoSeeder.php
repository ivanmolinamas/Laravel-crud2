<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Database\Factories\AlumnoFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creamos alumnos de tipo alumno
        Alumno::factory(50)->create();
    }
}
