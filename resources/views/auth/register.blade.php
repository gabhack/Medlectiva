<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Rol Selection -->
            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select id="role" name="role" class="block mt-1 w-full" required>
                    <option value="1">{{ __('Estudiante') }}</option>
                    <option value="2">{{ __('Médico') }}</option>
                    <option value="3">{{ __('Residente') }}</option>
                    <option value="4">{{ __('Fellow') }}</option>
                    <option value="5">{{ __('Especialista') }}</option>
                    <option value="6">{{ __('IPS') }}</option>

                </select>
            </div>

            <!-- Hospital Input (se ocultará si no es necesario) -->
            <div class="mt-4" id="hospitalDiv" style="display: none;">
                <x-label for="hospital" value="{{ __('IPS') }}" />
                <input id="hospital" type="text" class="block mt-1 w-full" name="hospital"
                    placeholder="Empieza a escribir el nombre de la IPS..." autocomplete="off" />
                <div id="suggestions" class="border mt-1"></div>
                <input type="hidden" id="hospitalNIT" name="NIT" />
                <div id="loadingIndicator" style="display:none;">Buscando...</div>
            </div>
            <input type="hidden" id="direccionCompleta" name="direccion_completa" />
            <input type="hidden" id="descripcion" name="descripcion" />


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>


        <script>
            function debounce(func, wait) {
                let timeout;
                return function(...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            }

            document.getElementById('role').addEventListener('change', function() {
                if (this.value == '5' || this.value == '6') {
                    document.getElementById('hospitalDiv').style.display = 'block';
                } else {
                    document.getElementById('hospitalDiv').style.display = 'none';
                }
            });

            const hospitalInput = document.getElementById('hospital');
            hospitalInput.addEventListener('input', debounce(function() {
                let query = this.value.trim();
                if (query.length < 3) return;

                let safeQuery = encodeURIComponent(query.replace(/'/g, "''"));
                let apiUrl =
                    'https://www.datos.gov.co/resource/ugc5-acjp.json?$where=lower(nombre_prestador) like \'%25' +
                    safeQuery + '%25\'';

                document.getElementById('loadingIndicator').style.display = 'block';

                fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Error fetching data");
                        }
                        return response.json();
                    })
                    .then(data => {
                        document.getElementById('loadingIndicator').style.display = 'none';
                        const suggestions = document.getElementById('suggestions');
                        suggestions.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach(item => {
                                let div = document.createElement('div');
                                div.textContent = item.nombre_prestador;
                                div.onclick = function() {
                                    hospitalInput.value = item.nombre_prestador;
                                    document.getElementById('hospitalNIT').value = item.nits_nit;

                                    // Aquí asignas la dirección completa
                                    let direccionCompleta =
                                        `${item.direccion}, ${item.muni_nombre}, ${item.depa_nombre}`;
                                    document.getElementById('direccionCompleta').value =
                                        direccionCompleta;

                                    // Aquí asignas la razón social
                                    document.getElementById('descripcion').value = item
                                    .razon_social;

                                    suggestions.innerHTML = '';
                                };

                                suggestions.appendChild(div);
                            });
                        } else {
                            let div = document.createElement('div');
                            div.textContent = "No se encontraron coincidencias.";
                            suggestions.appendChild(div);
                        }
                    })
                    .catch(error => {
                        document.getElementById('loadingIndicator').style.display = 'none';
                        console.error("There was an error:", error);
                    });
            }, 300));
        </script>

    </x-authentication-card>
</x-guest-layout>
