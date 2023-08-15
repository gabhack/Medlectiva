<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ciudad',
        'pais',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'especialidad_id',
        'hospital_id',
        'especialista_id',
        'especialista_descripcion',
        'tipo_rotacion',
        'acepta_estudiantes_medicina',
        'acepta_medicos_generales',
        'acepta_residentes',
        'acepta_fellows',
        'acepta_especialistas',
        'hace_consulta_externa',
        'hace_procedimientos',
        'hace_hospitalizacion',
        'hace_cirugia',
        'requiere_carta',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function especialistas()
    {
        return $this->belongsToMany(User::class, 'program_user', 'program_id', 'user_id')
            ->wherePivot('type', 'Especialista')
            ->withPivot('fecha_inicio', 'fecha_fin', 'carta_path')
            ->withTimestamps();
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'program_user', 'program_id', 'user_id')
            ->wherePivot('type', 'Estudiante')
            ->withPivot('fecha_inicio', 'fecha_fin', 'carta_path')
            ->withTimestamps();
    }

}