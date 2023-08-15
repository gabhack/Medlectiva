<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza la información de perfil y dirección de correo electrónico de tu cuenta.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Foto') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecccione una nueva foto') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remover') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Tu dirección de correo electrónico no está verificada.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Haz clic aquí para reenviar el correo electrónico de verificación.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                    </p>
                @endif
            @endif
        </div>

        @php
            $user = Auth::user();
            $allowedRoles = ['Estudiante', 'Médico', 'Residente', 'Fellow'];
            $isStudent = $user->hasAnyRole($allowedRoles);
            $isSpecialist = $user->hasRole('Especialista');
        @endphp
        @if ($isStudent)
            <!-- Suponiendo que 2 es el ID del rol de estudiante -->
            <!-- Añade los campos para los estudiantes aquí -->
            <!-- Fecha de Nacimiento -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="birth_date" value="{{ __('Fecha de nacimiento') }}" />
                <x-input id="birth_date" type="date" class="mt-1 block w-full" wire:model.defer="state.birth_date"
                    autocomplete="birth_date" />
                <x-input-error for="birth_date" class="mt-2" />
            </div>


            <!-- Número de Teléfono -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="phone" value="{{ __('Teléfono') }}" />
                <x-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone"
                    autocomplete="phone" />
                <x-input-error for="phone" class="mt-2" />
            </div>

            <!-- Formación Médica Actual -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="medical_formation" value="{{ __('Formación médica actual') }}" />
                <x-input id="medical_formation" type="text" class="mt-1 block w-full"
                    value="{{ $user->roles->first()->name }}" readonly />

                <x-input-error for="medical_formation" class="mt-2" />
            </div>

            <!-- Especialidad de Interés -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="interest_speciality" value="{{ __('Especialidad de interés') }}" />
                <x-input id="interest_speciality" type="text" class="mt-1 block w-full"
                    wire:model.defer="state.interest_speciality" autocomplete="interest_speciality" />
                <x-input-error for="interest_speciality" class="mt-2" />
            </div>


            @php
                $hospital_name = '';
                $hospital_id = auth()->user()->hospital_id; // Asumiendo que tienes una columna hospital_id en tu tabla de usuarios
                $hospital = App\Models\Hospital::find($hospital_id); // Asegúrate de usar el namespace correcto
                if ($hospital) {
                    $hospital_name = $hospital->nombre;
                }
            @endphp

            <div class="col-span-6 sm:col-span-4">
                <x-label for="hospital_name" value="{{ __('Hospital') }}" />
                <x-input id="hospital_name" type="text" class="mt-1 block w-full" value="{{ $hospital_name }}"
                    readonly />
                <x-input-error for="hospital_name" class="mt-2" />
            </div>
        @endif

        @if ($isSpecialist)
            <div class="col-span-6 sm:col-span-4">
                <x-label for="interest_speciality" value="{{ __('Especialidad de interés') }}" />
                <x-input id="speciality" type="text" class="mt-1 block w-full"
                    wire:model.defer="state.speciality" autocomplete="speciality" />
                <x-input-error for="speciality" class="mt-2" />
            </div>

            @php
                $hospital_name = '';
                $hospital_id = auth()->user()->hospital_id; // Asumiendo que tienes una columna hospital_id en tu tabla de usuarios
                $hospital = App\Models\Hospital::find($hospital_id); // Asegúrate de usar el namespace correcto
                if ($hospital) {
                    $hospital_name = $hospital->nombre;
                }
            @endphp

            <div class="col-span-6 sm:col-span-4">
                <x-label for="hospital_name" value="{{ __('Hospital') }}" />
                <x-input id="hospital_name" type="text" class="mt-1 block w-full" value="{{ $hospital_name }}"
                    readonly />
                <x-input-error for="hospital_name" class="mt-2" />
            </div>

            <!-- Número de Teléfono -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="phone" value="{{ __('Teléfono') }}" />
                <x-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone"
                    autocomplete="phone" />
                <x-input-error for="phone" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
