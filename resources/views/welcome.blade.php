<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MedLectiva</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.20/tailwind.min.css">
    </head>

    <body>

        <x-header />

        <main class="py-5">
            <section class="hero-banner bg-gray-100 py-10">
                <div class="w-full">
                    <div class="container mx-auto flex flex-col md:flex-row">

                        <!-- Div del texto a la izquierda -->
                        <div class="left flex-1 p-5 flex flex-col justify-center mb-4 md:mb-0">
                            <h1 class="text-3xl md:text-4xl font-bold mb-4">Inicia una rotación médica de excelencia
                            </h1>
                            <p class="mb-6 text-lg">Sumérgete en la experiencia clínica con programas de rotación en
                                hospitales y clínicas reconocidas a nivel mundial. Aprende de los mejores y construye un
                                sólido cimiento para tu carrera médica.</p>
                            <a href="/rotations"
                                class="btn btn-primary text-sm inline-block bg-blue-500 text-white px-6 py-2 md:px-8 md:py-3 rounded hover:bg-blue-600 w-full md:w-auto">Explora
                                todos los programas de rotación</a>
                        </div>

                        <!-- Div de la imagen a la derecha -->
                        <div class="right flex-1 p-5">
                            <img src="https://i.postimg.cc/3JqfrcLD/portada.png" alt="Imagen de un medico"
                                class="max-w-full h-full">
                        </div>
                    </div>
            </section>



            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12">
                    @foreach ($programs as $program)
                        <livewire:program-card :program="$program" :key="$program->id" />
                    @endforeach
                </div>
            </div>

            <p class="text-center">
                <a href="/rotations"
                    class="mt-20 inline-block bg-blue-500 text-white px-8 py-3 rounded hover:bg-blue-600">Explora
                    todos los programas de rotación</a>

            </p>
            </div>
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
