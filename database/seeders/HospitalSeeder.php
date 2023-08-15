<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    public function run()
    {
        $hospitales = [
            ['nombre' => 'Hospital General', 'descripcion' => 'Hospital general con diversas especialidades', 'direccion' => 'Calle principal 123'],
            ['nombre' => 'Clínica Dermatológica', 'descripcion' => 'Clínica especializada en dermatología', 'direccion' => 'Avenida secundaria 456'],
            // Añade aquí más hospitales según necesites
        ];

        foreach ($hospitales as $hospital) {
            Hospital::create($hospital);
        }
    }
}