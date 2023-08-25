<x-app-layout>
    <div class="container mx-auto px-4 mt-6">

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-6">Programas a los que ha enviado su solicitud</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($programs as $program)
                <div class="card p-5 border rounded shadow-lg">
                    <img src="https://via.placeholder.com/300x150" alt="Imagen de {{ $program->nombre ?? 'N/A' }}"
                        class="w-full rounded mb-5">
                    <h2 class="card-title text-2xl font-bold mb-3">{{ $program->nombre ?? 'N/A' }}</h2>

                    <p class="card-text mb-3 text-sm text-gray-600"><strong>Especialidad:</strong>
                        {{ optional($program->especialidad)->nombre ?? 'N/A' }}</p>
                    <p class="card-text mb-3 text-sm text-gray-600"><strong>Hospital:</strong>
                        {{ optional($program->hospital)->nombre ?? 'N/A' }}</p>
                    <p class="card-text mb-3 text-sm text-gray-600"><strong>Inicio:</strong>
                        {{ $program->fecha_inicio ?? 'N/A' }}
                    </p>
                    <p class="card-text mb-3 text-sm text-gray-600"><strong>Fin:</strong>
                        {{ $program->fecha_fin ?? 'N/A' }}</p>

                    <a href="/programs/{{ $program->id }}"
                        class="inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                        Más información
                    </a>
                </div>
            @empty
                <div class="col-span-2 text-center text-gray-600">
                    Usted no ha aplicado aún a ningún programa de rotación médica.
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>
