<div class="container mx-auto">
    <div class="relative w-1/2 mx-auto">
        <input type="text" wire:model="search" placeholder="Buscar programas de rotación médica..."
            class="w-full h-12 px-5 pr-10 rounded-none text-sm bg-gray-200 border border-blue-500 focus:outline-none focus:bg-white focus:shadow-outline focus:border-blue-500">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-5 mt-12 mb-10">
        @forelse($programs as $program)
            <livewire:program-card :program="$program" :key="$program->id" />
        @empty
            <div class="col-span-3 text-center text-gray-500">No se encontraron programas de rotación.</div>
        @endforelse
    </div>
</div>
