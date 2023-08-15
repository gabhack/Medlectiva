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
            <form action="{{ route('programs.store') }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1 class="text-2xl font-bold mb-4">Programa de rotación médica</h1>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                        Nombre del programa:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nombre" name="nombre" type="text" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="ciudad">
                        Ciudad:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="ciudad" name="ciudad" type="text" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="pais">
                        País:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="pais" name="pais" type="text" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                        Fecha de inicio:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="fecha_inicio" name="fecha_inicio" type="date" required>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="duracion">
                        Tiempo de Duración:
                    </label>
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="duracion" name="duracion" type="number" placeholder="#" required>
                        </div>

                        <div class="w-1/2">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="duracion_unidad" name="duracion_unidad" required>
                                <option value="">Seleccione una unidad</option>
                                <option value="dias">Días</option>
                                <option value="semanas">Semanas</option>
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
                        id="fecha_fin" name="fecha_fin" type="date" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                        Descripción:
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="descripcion" name="descripcion" required></textarea>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="especialidad_id">
                        ID de la Especialidad:
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="especialidad_id" name="especialidad_id" required>
                        @foreach ($especialidades as $especialidad)
                            <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hospital_id">
                        ID del Hospital:
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="hospital_id" name="hospital_id" required>
                        @foreach ($hospitales as $hospital)
                            <option value="{{ $hospital->id }}">{{ $hospital->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nivel_formacion">
                        Nivel de Formación:
                    </label>
                    <div>
                        <div><label><input type="checkbox" name="acepta_estudiantes_medicina"
                                    value="estudiantes_medicina">
                                Estudiantes de medicina</label></div>
                        <div><label><input type="checkbox" name="acepta_medicos_generales" value="medicos_generales">
                                Médicos
                                generales</label></div>
                        <div><label><input type="checkbox" name="acepta_residentes" value="residentes">
                                Residentes</label></div>
                        <div><label><input type="checkbox" name="acepta_fellows" value="fellows"> Fellows</label>
                        </div>
                        <div><label><input type="checkbox" name="acepta_especialistas" value="especialistas">
                                Especialistas</label></div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="actividades">
                        Actividades:
                    </label>
                    <div>
                        <div><label><input type="checkbox" name="hace_consulta_externa" value="consulta_externa">
                                Consulta
                                externa</label></div>
                        <div><label><input type="checkbox" name="hace_procedimientos" value="procedimientos">
                                Procedimientos</label></div>
                        <div><label><input type="checkbox" name="hace_hospitalizacion" value="hospitalizacion">
                                Hospitalización</label></div>
                        <div><label><input type="checkbox" name="hace_cirugia" value="cirugia"> Cirugía</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo_rotacion">
                        Tipo de Rotación:
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="tipo_rotacion" name="tipo_rotacion" required>
                        <option>Seleccione una opción</option>
                        <option value="observer" selected>Observer</option>
                        <option value="hands_on">Hands on</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="especialistas_adicionales">
                        Especialistas Adicionales:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="especialistas_adicionales" name="especialistas_adicionales" list="especialistas"
                        placeholder="Elija  especialista adicional">
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
                    <input
                        class="shadow appearance-none border rounded h-4 w-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-2"
                        id="requiere_carta" name="requiere_carta" type="checkbox">
                </div>
                <p></p>
                <p></p>
                <p></p>
                <div class="flex items-center justify-between">
                    <a href="{{ route('programs.index') }}"
                        class="text-gray-500 text-sm font-bold py-2 px-4 rounded hover:text-gray-700 focus:outline-none focus:shadow-outline">
                        Volver al listado
                    </a>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Crear Programa
                    </button>
                </div>





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
        fechaInicio.addEventListener('change', calcularFechaFin);
        duracion.addEventListener('change', calcularFechaFin);
        duracionUnidad.addEventListener('change', calcularFechaFin);

        // Marcar la fecha de finalización como solo lectura
        fechaFin.setAttribute('readonly', true);
    });
</script>
