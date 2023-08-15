<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SpecialistInvitationMail;
use App\Models\SpecialistInvitation;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SpecialistInvitationController extends Controller
{
    public function create()
    {
        $invitations = Auth::user()->hospital->invitations;
        return view('hospitals.invite', compact('invitations'));
    }

    public function store(Request $request)
    {
        $email = $request->input('email');
        $hospital = Auth::user()->hospital_id;

        $invitation = SpecialistInvitation::firstOrCreate(
            ['email' => $email, 'hospital_id' => $hospital],
            ['token' => Str::random(40)]
        );

        if (!$invitation->wasRecentlyCreated) {
            return redirect()->back()->withErrors(['email' => '¡Ya se envió una invitación a ese correo!']);
        }
        $hospitalName = Auth::user()->hospital->nombre;
        Mail::to($email)->send(new SpecialistInvitationMail($request->input('doctorName'), $invitation->token, $hospitalName));
        return redirect()->route('hospitals.invite')->with('message', '¡Invitación enviada!');
    }

}