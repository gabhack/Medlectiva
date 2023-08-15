<x-app-layout>
    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('message'))
        <div class="bg-green-500 text-white p-3 rounded mt-4">
            {{ session('message') }}
        </div>
    @endif


    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-center mt-10">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-2xl font-bold mb-4">Invitar a un especialista</h1>
                <form action="{{ route('hospitals.invite') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <x-label for="doctorName" value="{{ __('Nombre del Doctor') }}" />
                        <x-input id="doctorName" type="text" name="doctorName" class="mt-1 block w-full rounded-md"
                            placeholder="Dr. Juan Pérez" />
                    </div>

                    <div class="mb-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" type="email" name="email" class="mt-1 block w-full rounded-md"
                            required />
                    </div>

                    <div class="mt-4">
                        <x-button class="bg-blue-500 hover:bg-blue-600">
                            {{ __('Invite') }}
                        </x-button>
                    </div>
                </form>

                <!-- Lista de especialistas invitados -->
                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-4">Especialistas invitados:</h2>

                    @if ($invitations->count() === 0)
                        <p class="text-gray-600">No hay invitaciones a ningún especialista aún.</p>
                    @else
                        <ul>
                            @foreach ($invitations as $invitation)
                                <li class="mb-2 text-gray-700">{{ $invitation->email }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
