@php
    use App\Models\User;
    $especialista = User::find($program->especialista_id);
@endphp

<div class="card p-5 border rounded shadow-lg flex flex-col md:flex-row items-start h-auto md:h-144">
    <!-- Columna de imagen y nombre -->
    <div class="relative mb-4 md:mb-0 mr-0 md:mr-4 flex-shrink-0 w-full md:w-60 h-48 md:h-full">
        <img src="{{ $especialista->profile_photo_url }}" alt="{{ $especialista->name }}"
            class="h-48 md:h-120 w-full md:w-60 object-cover rounded">
        <div class="absolute bottom-0 bg-black bg-opacity-50 px-2 py-1 rounded-t">
            <h2 class="text-white text-xm font-bold">{{ $especialista->name }}</h2>
        </div>
    </div>

    <!-- Columna de información -->
    <div class="flex flex-col justify-between w-full">
        <div>
            <h2 class="card-title text-2xl font-bold mb-3">{{ $program->nombre ?? 'Programa #' }}</h2>
            <p class="text-gray-700">{{ $program->descripcion ?? 'Este programa no cuenta con una descripción.' }}</p>
        </div>

        <div>
            <p class="card-text mb-3 text-sm text-gray-600"><strong>Especialidad:</strong>
                {{ $program->especialidad->nombre ?? 'Desconocido' }}
            </p>
            <p class="card-text mb-3 text-sm text-gray-600"><strong>Hospital:</strong>
                {{ $program->hospital->nombre ?? 'Desconocido' }}
            </p>
            <p class="card-text mb-3 text-sm text-gray-600"><strong>Comienza a recibir estudiantes:</strong>
                {{ $program->fecha_inicio ?? 'Desconocido' }}
            </p>
            <p class="card-text mb-3 text-sm text-gray-600"><strong>Fecha tope de culminación del programa:</strong>
                {{ $program->fecha_fin ?? 'Desconocido' }}
            </p>

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
                    Aplicar
                </a>
            @endif
        </div>
    </div>
</div>
