<x-app-layout>
    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mis Programas de rotación médica') }}
            </h2>
        </x-slot>
        <div class="grid grid-cols-1 gap-6 mt-5">
            <div>
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ciudad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                País</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Inicio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Fin</th>
                            <!-- Puedes agregar más columnas para los campos que desees mostrar en la tabla -->
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($programs as $program)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $program->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $program->ciudad }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $program->pais }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $program->fecha_inicio }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $program->fecha_fin }}</td>
                                <!-- Puedes agregar más columnas para los campos que desees mostrar en la tabla -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('programs.show', $program) }}"
                                        class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('programs.edit', $program) }}"
                                        class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="text-red-600 hover:text-red-900"
                                        onclick="openModal({{ $program->id }})"><i class="fas fa-trash"></i></button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <a href="{{ route('programs.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-plus-circle"></i> - Crear Nuevo Programa
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- This is the modal -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="deleteModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Confirmar borrado
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-500">
                                    ¿Estás seguro de que deseas eliminar este programa? Este proceso no puede ser
                                    revertido.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none transition ease-in-out duration-150 sm:ml-3 sm:w-auto sm:text-sm">
                            Borrar
                        </button>
                    </form>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button onclick="closeModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancelar
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(id) {
            document.getElementById('deleteForm').action = '/programs/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>



</x-app-layout>
