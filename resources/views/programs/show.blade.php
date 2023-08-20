<x-guest-layout>
    <x-header />

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex items-start justify-center mt-10 p-5">
        <div class="flex w-full max-w-6xl">
            @php
                $especialista = $especialistas->firstWhere('id', $program->especialista_id);
            @endphp
            <div class="w-1/3 px-4">
                <div class="bg-white shadow-md rounded p-5 mb-4">
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $especialista->profile_photo_url }}" alt="{{ $especialista->name }}"
                            class="h-120 w-60 object-cover">
                    </div>
                    <h2 class="mt-10 text-xl font-bold mb-2">{{ $especialista->name }}</h2>
                    <p class="text-gray-700">{{ $program->descripcion }}</p>
                </div>
                @if ($program->requiere_carta)
                    <div class="mb-4 flex items-center">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="requiere_carta">
                            Requiere Carta de recomendación:
                        </label>
                        <input disabled
                            class="shadow appearance-none border rounded h-4 w-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-2"
                            id="requiere_carta" name="requiere_carta" type="checkbox" checked>
                    </div>
                @endif

                <div class="mb-4 flex items-center">
                    <a href="{{ route('programs.authIndex') }}"
                        class="text-blue-500 text-sm font-bold py-2 
                        rounded hover:text-blue-700 focus:outline-none focus:shadow-outline">
                        Volver al listado
                    </a>
                </div>
            </div>

            <div class="w-2/3 px-4">

                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <h1 class="text-2xl font-bold mb-4">{{ $program->nombre }}</h1>


                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Ciudad:
                        </label>
                        <div class="bg-gray-50 shadow-md rounded w-full py-2 px-3 text-gray-700 leading-tight">
                            {{ $program->ciudad ?? 'No especificado' }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Comienza a recibir estudiantes:
                        </label>
                        <p class="mb-2 text-xs text-gray-500">El estudiante puede elegir una fecha que se encuentre en
                            el intervalo:</p>
                        <div class="bg-gray-50 shadow-md rounded w-full py-2 px-3 text-gray-700 leading-tight">
                            {{ $program->fecha_inicio ?? 'No especificado' }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Limite de culminación del programa:
                        </label>
                        <div class="bg-gray-50 shadow-md rounded w-full py-2 px-3 text-gray-700 leading-tight">
                            {{ $program->fecha_fin ?? 'No especificado' }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Especialidad del programa:
                        </label>
                        <div class="bg-gray-50 shadow-md rounded w-full py-2 px-3 text-gray-700 leading-tight">
                            @foreach ($especialidades as $especialidad)
                                @if ($especialidad->id == $program->especialidad_id)
                                    {{ $especialidad->nombre }}
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        IPS:
                    </label>
                    <div class="bg-gray-50 shadow-md rounded w-full py-2 px-3 text-gray-700 leading-tight">
                        @foreach ($hospitales as $hospital)
                            @if ($hospital->id == $program->hospital_id)
                                {{ $hospital->nombre }}
                            @break
                        @endif
                    @endforeach
                </div>
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nivel_formacion">
                    Nivel de Formación:
                </label>
                <div>
                    @if ($program->acepta_estudiantes_medicina)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_estudiantes_medicina"
                                    value="1" checked>
                                Estudiantes Medicina
                            </label>
                        </div>
                    @endif

                    @if ($program->acepta_medicos_generales)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_medicos_generales" value="1"
                                    checked>
                                Médicos Generales
                            </label>
                        </div>
                    @endif

                    @if ($program->acepta_residentes)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_residentes" value="1" checked>
                                Residentes
                            </label>
                        </div>
                    @endif

                    @if ($program->acepta_fellows)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_fellows" value="1" checked>
                                Fellows
                            </label>
                        </div>
                    @endif

                    @if ($program->acepta_especialistas)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_especialistas" value="1"
                                    checked>
                                Especialistas
                            </label>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="actividades">
                    Actividades:
                </label>
                <div>
                    @if ($program->hace_consulta_externa)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_consulta_externa" value="1"
                                    checked>
                                Consulta Externa
                            </label>
                        </div>
                    @endif

                    @if ($program->hace_procedimientos)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_procedimientos" value="1"
                                    checked>
                                Procedimientos
                            </label>
                        </div>
                    @endif

                    @if ($program->hace_hospitalizacion)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_hospitalizacion" value="1"
                                    checked>
                                Hospitalización
                            </label>
                        </div>
                    @endif

                    @if ($program->hace_cirugia)
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_cirugia" value="1" checked>
                                Cirugía
                            </label>
                        </div>
                    @endif
                </div>
            </div>



            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo_rotacion">
                    Tipo de Rotación:
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="tipo_rotacion" name="tipo_rotacion" required readonly>
                    @if ($program->tipo_rotacion == 'observer')
                        <option value="observer" selected>Observer</option>
                        <option value="hands_on">Hands on</option>
                    @else
                        <option value="observer">Observer</option>
                        <option value="hands_on" selected>Hands on</option>
                    @endif
                </select>
            </div>


            <div class="flex items-center justify-between">

                @if (Auth::check())
                    <!-- Verifica si hay un usuario autenticado -->
                    @if (Auth::user()->hasRole('Especialista'))
                        <a href="{{ route('programs.edit', $program->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Editar este programa
                        </a>
                    @else
                        <a href="{{ route('programs.enroll', $program->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Quiero inscribirme
                        </a>
                    @endif

                @endif

            </div>


        </form>

    </div>

</div>

</div>

</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {



        var fechaInicio = document.querySelector('#fecha_inicio');
        var duracion = document.querySelector('#duracion');
        var duracionUnidad = document.querySelector('#duracion_unidad');
        var fechaFin = document.querySelector('#fecha_fin');


        var calcularDias = function() {
            if (fechaInicio && fechaFin) {
                let duracion = Math.round((new Date(fechaFin.value) - new Date(fechaInicio.value)) / (1000 *
                    60 *
                    60 * 24));
                document.getElementById('duracion').value = duracion;
            }
        }
        calcularDias();
        // Esta función calcula la fecha de finalización
        var calcularFechaFin = function() {
            var inicio = new Date(fechaInicio.value);
            var duracionValue = Number(duracion.value);

            // Convertir la duración a días basado en la unidad seleccionada
            switch (duracionUnidad.value) {
                case 'semanas':
                    duracionValue *= 7;
                    break;
                case 'meses':
                    duracionValue *= 30;
                    break;
                case 'años':
                    duracionValue *= 365;
                    break;
            }

            if (!isNaN(inicio) && !isNaN(duracionValue)) {
                inicio.setDate(inicio.getDate() + duracionValue);
                fechaFin.value = inicio.toISOString().split('T')[0];
            }
        }

        // Escuchar los cambios en los campos relevantes

        // Marcar la fecha de finalización como solo lectura
        fechaFin.setAttribute('readonly', true);
        fechaInicio.setAttribute('readonly', true);
        duracion.setAttribute('readonly', true);
        duracionUnidad.setAttribute('readonly', true);

    });
</script>
