<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialistInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'email',
        'token',
    ];

    /**
     * Get the hospital that owns the invitation.
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}