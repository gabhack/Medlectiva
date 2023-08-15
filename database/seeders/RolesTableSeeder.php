<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;



class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Estudiante']);
        Role::create(['name' => 'Médico']);
        Role::create(['name' => 'Residente']);
        Role::create(['name' => 'Fellow']);
        Role::create(['name' => 'Especialista']);
        Role::create(['name' => 'IPS']);

    }
}