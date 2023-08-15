<?php

namespace App\Policies;

use App\Models\Program;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProgramPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Program $program)
    {
        // Permitir la actualización solo si el usuario es un especialista y es el creador del programa
        return $user->hasRole('Especialista');
    }

    public function create()
    {
        $user = Auth::user();
        // Permitir la actualización solo si el usuario es un especialista
        return $user->hasRole('Especialista');
    }

    public function delete(User $user, Program $program)
    {
        $user = Auth::user();
        // Permitir la eliminación solo si el usuario es un especialista y es el creador del programa
        return $user->hasRole('Especialista') && $user->id === $program->especialista_id;
    }

    public function enroll()
    {
        $user = Auth::user();

        $allowedRoles = ['Estudiante', 'Médico', 'Residente', 'Fellow'];

        return $user->hasAnyRole($allowedRoles);
    }


}