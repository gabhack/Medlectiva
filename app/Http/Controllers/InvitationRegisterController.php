<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\SpecialistInvitation;
use App\Models\User;
use Illuminate\Http\Request;

class InvitationRegisterController extends Controller
{
    public function showRegistrationForm(Request $request)
    {
        $token = $request->query('token');

        // Variables predeterminadas
        $invitation = null;
        $hospital = null;
        $specialist = null;

        if ($token) {
            // Intenta obtener la invitación usando el token
            $invitation = SpecialistInvitation::where('token', $token)->first();

            if ($invitation) {
                // Si hay una invitación válida con ese token, obtén los datos relacionados
                $hospital = Hospital::findOrFail($invitation->hospital_id);
                $specialist = User::where('email', $invitation->email)->first();
            } else {
                // Aquí podrías agregar un mensaje de error si el token no es válido
                session()->flash('error', 'Token no válido.');
            }
        }

        return view('auth.register', [
            'invitation' => $invitation,
            'hospital' => $hospital,
            'specialist' => $specialist,
        ]);
    }

}