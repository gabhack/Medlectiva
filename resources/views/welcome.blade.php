<x-guest-layout>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MedLectiva</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.20/tailwind.min.css">
    </head>

    <body class="bg-gray-100">

        <x-header />

        <main class="py-5">
            <section class="bg-gray-200 py-10 px-4">
                <div class="container mx-auto">

                    <!-- Flex layout for large screens, stack for small screens -->
                    <div class="flex flex-col md:flex-row">

                        <!-- Text left -->
                        <div class="flex-1 p-5 flex flex-col justify-center mb-4 md:mb-0">
                            <h1 class="text-2xl md:text-4xl font-bold mb-4">Inicia una rotación médica de excelencia
                            </h1>
                            <p class="mb-6 text-lg">Sumérgete en la experiencia clínica con programas de rotación en
                                hospitales y clínicas reconocidas a nivel mundial. Aprende de los mejores y construye un
                                sólido cimiento para tu carrera médica.</p>
                            <a href="/rotations"
                                class="text-sm inline-block bg-blue-500 text-white px-8 py-3 rounded hover:bg-blue-600">Explora
                                todos los programas de rotación</a>
                        </div>

                        <!-- Image right -->
                        <div class="flex-1 p-5">
                            <img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://images.ctfassets.net/wp1lcwdav1p1/5CFC8u8XiXcbSOlVv6JZQx/4e6f898f57f9d798437b3aa22026e30b/CourseraLearners_C_Composition_Hillary_copy__3_.png?auto=format%2Ccompress&amp;dpr=1&amp;w=459&amp;h=497&amp;q=40"
                                alt="Imagen de una persona estudiando ciberseguridad" class="w-full md:max-w-md">
                        </div>

                    </div>
                </div>
            </section>

            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12">
                    @foreach ($programs as $program)
                        <livewire:program-card :program="$program" :key="$program->id" />
                    @endforeach
                </div>

                <p class="text-center mt-8">
                    <a href="/rotations"
                        class="inline-block bg-blue-500 text-white px-8 py-3 rounded hover:bg-blue-600">Explora todos
                        los programas de rotación</a>
                </p>
            </div>
        </main>

        <footer class="bg-gray-300 py-5 px-4">
            <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
                <a href="/about" class="text-gray-700 font-bold text-xl mb-4 md:mb-0">Acerca de MedLectiva</a>
                <div class="flex flex-col md:flex-row">
                    <a href="/contact" class="text-gray-700 font-bold py-2 px-4">Contáctanos</a>
                    <a href="/privacy" class="text-gray-700 font-bold py-2 px-4">Política de Privacidad</a>
                    <a href="/terms" class="text-gray-700 font-bold py-2 px-4">Términos de Servicio</a>
                </div>
            </div>
        </footer>
    </body>

    </html>
</x-guest-layout>
