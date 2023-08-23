<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rotaciones | MedLectiva</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.20/tailwind.min.css">
    </head>

    <body>


        <!-- Sección principal de Rotaciones -->
        <h1 class="mt-20 text-center text-4xl font-bold mb-8">Nuestros Programas de Rotación</h1>
        <livewire:program-search />


        <!-- Footer -->
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
</x-app-layout>
