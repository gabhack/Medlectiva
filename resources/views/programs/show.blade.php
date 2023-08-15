<x-app-layout>
    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex items-center justify-center mt-10">
        <div class="w-full max-w-2xl">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1 class="text-2xl font-bold mb-4">{{ $program->nombre }}</h1>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="ciudad">
                        Ciudad:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="ciudad" name="ciudad" type="text" value="{{ $program->ciudad }}" required readonly>

                    @if (empty($program->ciudad))
                        <p class="text-gray-500 text-sm">Ingrese la ciudad del programa.</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="pais">
                        País:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="pais" name="pais" type="text" value="{{ $program->pais }}" required readonly>

                    @if (empty($program->pais))
                        <p class="text-gray-500 text-sm">Ingrese el país del programa.</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                        Fecha de inicio:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="fecha_inicio" name="fecha_inicio" type="date" value="{{ $program->fecha_inicio }}"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="duracion">
                        Tiempo de Duración:
                    </label>
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="duracion" name="duracion" type="number" value="{{ $program->duracion }}">
                        </div>

                        <div class="w-1/2">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="duracion_unidad" name="duracion_unidad" required>
                                <option value="">Seleccione una unidad</option>
                                <option value="dias" selected>Días</option>
                                <option value="semanas">Semanas
                                </option>
                                <option value="meses">Meses</option>
                                <option value="años">Años</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_fin">
                        Fecha de finalización:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="fecha_fin" name="fecha_fin" type="date" value="{{ $program->fecha_fin }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                        Descripción:
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="descripcion" name="descripcion" required>{{ $program->descripcion }}</textarea>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="especialidad_id">
                        ID de la Especialidad:
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="especialidad_id" name="especialidad_id" required readonly>
                        @foreach ($especialidades as $especialidad)
                            @if ($especialidad->id == $program->especialidad_id)
                                <option value="{{ $especialidad->id }}" selected>{{ $especialidad->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hospital_id">
                        ID del Hospital:
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="hospital_id" name="hospital_id" required readonly>
                        @foreach ($hospitales as $hospital)
                            @if ($hospital->id == $program->hospital_id)
                                <option value="{{ $hospital->id }}" selected>{{ $hospital->nombre }}</option>
                            @else
                                <option value="{{ $hospital->id }}">{{ $hospital->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nivel_formacion">
                        Nivel de Formación:
                    </label>
                    <div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_estudiantes_medicina" value="1"
                                    {{ $program->acepta_estudiantes_medicina ? 'checked' : '' }}>
                                Estudiantes Medicina
                            </label>
                        </div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_medicos_generales" value="1"
                                    {{ $program->acepta_medicos_generales ? 'checked' : '' }}>
                                Médicos Generales
                            </label>
                        </div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_residentes" value="1"
                                    {{ $program->acepta_residentes ? 'checked' : '' }}>
                                Residentes
                            </label>
                        </div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_fellows" value="1"
                                    {{ $program->acepta_fellows ? 'checked' : '' }}>
                                Fellows
                            </label>
                        </div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="acepta_especialistas" value="1"
                                    {{ $program->acepta_especialistas ? 'checked' : '' }}>
                                Especialistas
                            </label>
                        </div>
                    </div>
                </div>



                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="actividades">
                        Actividades:
                    </label>
                    <div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_consulta_externa" value="1"
                                    {{ $program->hace_consulta_externa ? 'checked' : '' }}>
                                Consulta Externa
                            </label>
                        </div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_procedimientos" value="1"
                                    {{ $program->hace_procedimientos ? 'checked' : '' }}>
                                Procedimientos
                            </label>
                        </div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_hospitalizacion" value="1"
                                    {{ $program->hace_hospitalizacion ? 'checked' : '' }}>
                                Hospitalización
                            </label>
                        </div>
                        <div>
                            <label>
                                <input disabled type="checkbox" name="hace_cirugia" value="1"
                                    {{ $program->hace_cirugia ? 'checked' : '' }}>
                                Cirugía
                            </label>
                        </div>
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

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="especialistas_adicionales">
                        Especialistas Adicionales:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="especialistas_adicionales" name="especialistas_adicionales" list="especialistas"
                        placeholder="Elija  especialista adicional" readonly>
                    <datalist id="especialistas">
                        @foreach ($especialistas as $especialista)
                            <option value="{{ $especialista->id }}">{{ $especialista->name }}</option>
                        @endforeach
                    </datalist>
                </div>

                <div class="mb-4 flex items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="requiere_carta">
                        Requiere Carta:
                    </label>
                    <input disabled
                        class="shadow appearance-none border rounded h-4 w-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-2"
                        id="requiere_carta" name="requiere_carta" type="checkbox"
                        @if ($program->requiere_carta) checked @endif>
                </div>
                <div class="flex items-center justify-between">
                    <a href="{{ route('programs.index') }}"
                        class="text-gray-500 text-sm font-bold py-2 px-4 rounded hover:text-gray-700 focus:outline-none focus:shadow-outline">
                        Volver al listado
                    </a>
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
                </div>


            </form>

        </div>
    </div>

</x-app-layout>

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
