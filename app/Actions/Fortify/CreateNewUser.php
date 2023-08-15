<?php

namespace App\Actions\Fortify;

use App\Models\Hospital;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'integer', 'between:1,6'],
            'hospital' => $input['role'] == 5 || $input['role'] == 6 ? ['required', 'string'] : '',
            'NIT' => $input['role'] == 5 || $input['role'] == 6 ? ['required', 'numeric'] : '',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if ($input['role'] == 6) {
            $hospital = Hospital::where('NIT', $input['NIT'])->first();

            if ($hospital) {
                $existingUserWithRole6 = User::whereHas('roles', function ($query) {
                    $query->where('name', 'IPS');
                })->where('hospital_id', $hospital->id)->first();

                if ($existingUserWithRole6) {
                    // Lanza una excepción para informar que ya existe un usuario con el rol IPS para ese hospital.
                    throw new \Exception('Ya existe un usuario con el rol IPS para este hospital.');
                }
            }
        }

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $roleName = $this->getRoleName($input['role']);
        $user->assignRole($roleName);

        if ($input['role'] == 5 || $input['role'] == 6) {
            $hospital = Hospital::firstOrCreate(
                ['NIT' => $input['NIT']],
                [
                    'nombre' => $input['hospital'],
                    'direccion' => '',
                    'descripcion' => '',
                ]
            );

            $user->hospital_id = $hospital->id;
            $user->save();
        }

        return $user;
    }

    private function getRoleName(int $roleNumber): string
    {
        switch ($roleNumber) {
            case 1:
                return 'Estudiante';
            case 2:
                return 'Médico';
            case 3:
                return 'Residente';
            case 4:
                return 'Fellow';
            case 5:
                return 'Especialista';
            case 6:
                return 'IPS';
            default:
                return 'Estudiante'; // Por si acaso, retorna 'Estudiante' por defecto
        }
    }
}