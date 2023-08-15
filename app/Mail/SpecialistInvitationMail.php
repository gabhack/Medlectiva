<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SpecialistInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $name;
    public $hospitalName;

    public function __construct($name, $token, $hospitalName)
    {
        $this->token = $token;
        $this->name = $name;
        $this->hospitalName = $hospitalName;
    }

    public function build()
    {
        return $this->subject('Invitación Medlectiva: Publique su programa de rotación')
            ->markdown('emails.specialistinvitation'); // Esto usará una vista markdown. Puedes usar 'view' en lugar de 'markdown' si prefieres.
    }
}