<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'country',
        'phone_number',
        'current_medical_training',
        'specialty_of_interest',
        'hospital_id',
        'medical_specialty',
        'workplace',
        'nationality',
        'first_time',
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'first_time' => 'boolean', // Para manejar el tinyint como booleano
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_user', 'user_id', 'program_id')
            ->withPivot('fecha_inicio', 'fecha_fin', 'carta_path')
            ->withTimestamps();
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

}