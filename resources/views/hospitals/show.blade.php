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

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-center mt-10">
        <div class="w-full max-w-2xl">

            <!-- Display the hospital details -->
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-2xl font-bold mb-4">Detalle de la IPS</h1>

                <div class="mb-4">
                    <span class="text-gray-700 text-sm font-bold">Nombre:</span>
                    <span class="ml-2 text-gray-700">{{ $hospital->nombre }}</span>
                </div>

                <div class="mb-4">
                    <span class="text-gray-700 text-sm font-bold">Razón Social:</span>
                    <span class="ml-2 text-gray-700">{{ $hospital->descripcion }}</span>
                </div>

                <div class="mb-4">
                    <span class="text-gray-700 text-sm font-bold">Dirección:</span>
                    <span class="ml-2 text-gray-700">{{ $hospital->direccion }}</span>
                </div>

                <!-- Display the NIT of the hospital -->
                <div class="mb-4">
                    <span class="text-gray-700 text-sm font-bold">NIT:</span>
                    <span class="ml-2 text-gray-700">{{ $hospital->NIT }}</span>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
