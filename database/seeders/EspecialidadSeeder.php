<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    public function run()
    {
        $especialidades = [
            ['nombre' => 'Cardiología', 'descripcion' => 'Especialidad dedicada al estudio del corazón'],
            ['nombre' => 'Dermatología', 'descripcion' => 'Especialidad dedicada al estudio de la piel'],
            // Añade aquí más especialidades según necesites
        ];

        foreach ($especialidades as $especialidad) {
            Especialidad::create($especialidad);
        }
    }
}