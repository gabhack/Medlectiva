<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú MedLectiva</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <nav class="bg-gray-100">
        <div class="container mx-auto px-6 py-5">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="/">
                    <img src="/storage/imagenes/logo-banner.png" alt="MedLectiva Logo" class="h-14">
                </a>

                <!-- Desktop & Mobile Menu -->
                <div class="flex items-center">
                    <!-- Desktop Menu -->
                    <div class="hidden sm:flex items-center mr-4">
                        <a href="/rotations" class="text-blue-500 font-bold py-2 px-4">Programas de Rotación</a>

                        <!-- Profile Dropdown -->
                        <div class="relative group">
                            <button class="text-blue-500 font-bold py-2 px-4 focus:outline-none">Tu Perfil</button>
                            <div
                                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white transition-opacity opacity-0 group-hover:opacity-100">
                                <a href="/register"
                                    class="block px-4 py-2 text-black hover:bg-blue-500 hover:text-white">Registro</a>
                                <a href="/login"
                                    class="block px-4 py-2 text-black hover:bg-blue-500 hover:text-white">Login</a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button-->
                    <div class="sm:hidden">
                        <button id="menu-toggle"
                            class="text-blue-500 hover:text-blue-300 focus:outline-none focus:text-blue-300">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Content (Hidden by default) -->
            <div id="mobile-menu" class="hidden sm:hidden mt-4">
                <a href="/rotations" class="block text-blue-500 py-2 px-4">Programas de Rotación</a>
                <a href="/register" class="block text-blue-500 py-2 px-4">Registro</a>
                <a href="/login" class="block text-blue-500 py-2 px-4">Login</a>
            </div>
        </div>
    </nav>

    <!-- Aquí puedes incluir el contenido de tu página -->

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            const menu = document.getElementById("mobile-menu");
            if (menu.style.display === "none" || menu.style.display === "") {
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        });
    </script>

</body>

</html>
