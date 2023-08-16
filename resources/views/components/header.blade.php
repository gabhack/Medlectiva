<div>
    <header class="bg-blue-500 py-5">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white font-bold text-2xl">MedLectiva</a>

            <!-- Botón hamburguesa solo visible en móvil -->
            <button onclick="toggleMenu()" class="md:hidden flex items-center p-3 hover:bg-blue-700">
                <span class="text-white font-bold">☰</span>
            </button>

            <!-- Menú, oculto por defecto en móvil, visible en pantallas medianas y grandes -->
            <div id="navbar" class="hidden md:flex items-center">
                <a href="/rotations" class="text-white font-bold py-2 px-4">Programas de Rotación</a>
                <div class="relative group">
                    <button class="text-white font-bold py-2 px-4 focus:outline-none">Tu Perfil</button>
                    <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity">
                        <a href="/register" class="block px-4 py-2 text-black hover:bg-blue-500 hover:text-white">Registro</a>
                        <a href="/login" class="block px-4 py-2 text-black hover:bg-blue-500 hover:text-white">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Añadir un poco de JavaScript para manejar el menú hamburguesa -->
    <script>
        function toggleMenu() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('hidden');
        }
    </script>
</div>
