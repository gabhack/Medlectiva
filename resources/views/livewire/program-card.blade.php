<div class="card p-5 border rounded shadow-lg">
    <!-- Imagen del doctor/programa -->
    <img src="https://via.placeholder.com/300x150" alt="Imagen de {{ $program->nombre ?? 'Desconocido' }}"
        class="w-full rounded mb-5">

    <!-- Nombre del programa -->
    <h2 class="card-title text-2xl font-bold mb-3">{{ $program->nombre ?? 'Desconocido' }}</h2>

    <!-- Detalles del programa. Suponiendo que $program tiene las propiedades correspondientes a los datos mostrados -->
    <p class="card-text mb-3 text-sm text-gray-600"><strong>Especialidad:</strong>
        {{ $program->especialidad->nombre ?? 'Desconocido' }}
    </p>
    <p class="card-text mb-3 text-sm text-gray-600"><strong>Hospital:</strong>
        {{ $program->hospital->nombre ?? 'Desconocido' }}</p>
    <p class="card-text mb-3 text-sm text-gray-600"><strong>Comineza a recibir estudiantes:</strong>
        {{ $program->fecha_inicio ?? 'Desconocido' }}</p>
    <p class="card-text mb-3 text-sm text-gray-600"><strong>Fecha tope de culminación del programa:</strong> {{ $program->fecha_fin ?? 'Desconocido' }}</p>
    <a href="{{ route('programs.show', $program->id ?? '#') }}"
        class="inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
        Más información
    </a>

    @php
        $allowedRoles = ['Estudiante', 'Médico', 'Residente', 'Fellow'];
    @endphp

    @if (auth()->user() &&
            auth()->user()->hasAnyRole($allowedRoles))
        <a href="{{ route('programs.showEnrollForm', $program->id ?? '#') }}"
            class="inline-block bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 ml-4">
            Inscribirse
        </a>
    @endif

</div>
