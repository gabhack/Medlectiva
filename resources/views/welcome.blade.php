<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MedLectiva</title>
    </head>

    <body>

        <x-header />

        <main class="py-5">
            <!-- Nuevo diseño del hero banner basado en el ejemplo -->
            <section class="flex flex-col lg:flex-row items-stretch h-screen max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Sección de texto -->
                <div class="flex flex-col justify-center w-full lg:w-1/2">
                    <h1 class="text-4xl tracking-tight font-bold text-gray-800 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Inicia una rotación médica</span>
                        <span class="block text-blue-500 xl:inline">de excelencia</span>
                    </h1>
                    <p class="mt-3 text-lg text-gray-500 sm:mt-5 sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Sumérgete en la experiencia clínica con programas de rotación en hospitales y clínicas
                        reconocidas a nivel mundial. Aprende de los mejores y construye un sólido cimiento para tu
                        carrera médica.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="/rotations"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 md:py-4 md:text-lg md:px-10">
                                Explora todos los programas de rotación
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Sección de imagen -->
                <div class="flex-shrink-0 w-full lg:w-1/2 h-3/4 bg-cover bg-right"
                    style="background-image: url('{{ asset('storage/imagenes/portadasinfondo.png') }}');">
                    <!-- La imagen se establece como fondo para ocupar todo el espacio -->
                </div>
            </section>


            <livewire:program-search />


            <p class="text-center">
                <a href="/rotations"
                    class="mt-20 inline-block bg-blue-500 text-white px-8 py-3 rounded hover:bg-blue-600">Explora
                    todos los programas de rotación</a>
            </p>

        </main>

        <footer class="bg-gray-200 py-5">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/about" class="text-gray-500 font-bold text-2xl">Acerca de MedLectiva</a>
                <div class="flex">
                    <a href="/contact" class="text-gray-500 font-bold py-2 px-4">Contáctanos</a>
                    <a href="/privacy" class="text-gray-500 font-bold py-2 px-4">Política de Privacidad</a>
                    <a href="/terms" class="text-gray-500 font-bold py-2 px-4">Términos de Servicio</a>
                </div>
            </div>
        </footer>
    </body>

    </html>
</x-guest-layout>
