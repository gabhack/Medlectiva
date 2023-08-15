<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            [
                'nombre' => 'Programa 4',
                'ciudad' => 'Ciudad 2',
                'pais' => 'País 2',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addMonths(4),
                'descripcion' => 'Programa orientado a la cardiología con amplia experiencia práctica.',
                'especialidad_id' => 2,
                'hospital_id' => 7,
                'especialista_id' => 10,
                'especialista_descripcion' => 'Experto en cardiología con más de 10 años de experiencia.',
                'tipo_rotacion' => 'Tipo 2',
                'especialistas_adicionales' => null,
                'requiere_carta' => true,
            ],
            [
                'nombre' => 'Programa 5',
                'ciudad' => 'Ciudad 2',
                'pais' => 'País 2',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addWeeks(12),
                'descripcion' => 'Especialidad en pediatría. Programa teórico y práctico.',
                'especialidad_id' => 3,
                'hospital_id' => 8,
                'especialista_id' => 11,
                'especialista_descripcion' => 'Pediatra con especialización en neonatología.',
                'tipo_rotacion' => 'Tipo 3',
                'especialistas_adicionales' => null,
                'requiere_carta' => true,
            ],
            [
                'nombre' => 'Programa 6',
                'ciudad' => 'Ciudad 3',
                'pais' => 'País 3',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addMonths(5),
                'descripcion' => 'Orientado a la neurología. Enfoque en enfermedades neurodegenerativas.',
                'especialidad_id' => 4,
                'hospital_id' => 9,
                'especialista_id' => 12,
                'especialista_descripcion' => 'Neurólogo especializado en enfermedades degenerativas.',
                'tipo_rotacion' => 'Tipo 4',
                'especialistas_adicionales' => null,
                'requiere_carta' => false,
            ],
            [
                'nombre' => 'Programa 7',
                'ciudad' => 'Ciudad 4',
                'pais' => 'País 4',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addWeeks(16),
                'descripcion' => 'Programa de dermatología. Tratamiento de afecciones de la piel.',
                'especialidad_id' => 5,
                'hospital_id' => 7,
                'especialista_id' => 13,
                'especialista_descripcion' => 'Dermatólogo con experiencia en tratamientos avanzados.',
                'tipo_rotacion' => 'Tipo 2',
                'especialistas_adicionales' => null,
                'requiere_carta' => false,
            ],
            [
                'nombre' => 'Programa 8',
                'ciudad' => 'Ciudad 5',
                'pais' => 'País 5',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addMonths(3),
                'descripcion' => 'Programa de gastroenterología. Diagnóstico y tratamiento de afecciones digestivas.',
                'especialidad_id' => 6,
                'hospital_id' => 8,
                'especialista_id' => 4,
                'especialista_descripcion' => 'Experto en el sistema digestivo y sus afecciones.',
                'tipo_rotacion' => 'Tipo 3',
                'especialistas_adicionales' => null,
                'requiere_carta' => true,
            ],
        ]);
    }
}