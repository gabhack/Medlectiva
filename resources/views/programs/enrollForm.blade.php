<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-2xl mb-5 font-bold">Inscripción al Programa Médico</h1>

            <div class="mb-5 bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                <p class="font-bold">Importante</p>
                <p>Al proporcionar esta información, nos ayudas a preparar una experiencia personalizada y a garantizar
                    que cumple con los requisitos del programa. Asegúrate de que las fechas estén dentro de los límites
                    del programa y, si es necesario, sube tu carta de recomendación.</p>
            </div>

            <div class="mb-5 border p-4 rounded">
                <h2 class="text-xl mb-2">{{ $program->nombre }}</h2>
                <p><strong>Especialidad:</strong> {{ $program->especialidad->nombre ?? 'Desconocido' }}</p>
                <p><strong>Hospital:</strong> {{ $program->hospital->nombre ?? 'Desconocido' }}</p>
                <p><strong>Desde:</strong> {{ $program->fecha_inicio ?? 'Desconocido' }}</p>
                <p><strong>Hasta:</strong> {{ $program->fecha_fin ?? 'Desconocido' }}</p>
            </div>

            <form action="{{ route('programs.enroll', $program->id) }}" method="post" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <div>
                    <x-label for="fecha_inicio" value="Fecha de Inicio" />
                    <x-input id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio"
                        :min="$program->fecha_inicio" :max="$program->fecha_fin" required />
                </div>

                <div>
                    <x-label for="fecha_fin" value="Fecha de Fin" />
                    <x-input id="fecha_fin" class="block mt-1 w-full" type="date" name="fecha_fin" :min="$program->fecha_inicio"
                        :max="$program->fecha_fin" required />
                </div>

                @if ($program->requiere_carta)
                    <div>
                        <x-label for="carta" value="Carta de Recomendación" />
                        <x-input id="carta" class="block mt-1 w-full" type="file" name="carta" />
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <x-button class="bg-blue-500 hover:bg-blue-600">
                        Inscribirse
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
