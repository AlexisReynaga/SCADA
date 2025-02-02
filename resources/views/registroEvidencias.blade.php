<x-esqueleto>
    <x-nav-bar></x-nav-bar>    
    <div class="flex items-center justify-center bg-gray-100 min-h-[90vh] mt-2">
        <div class="bg-gray-300 p-8 rounded-lg shadow-lg max-w-5xl w-full">
            <h2 class="text-xl font-bold text-gray-800 text-center">Registro de Evidencia</h2>
            
            <!-- Contenedor de subida de archivos -->
            <div class="bg-gray-200 p-6 rounded-lg mt-4 shadow-md text-center">
                <img src="{{ asset('images/upload.png') }}" alt="subir" class="h-32 mx-auto">  
                <p class="text-gray-500 mt-1">Arrastra tus Elementos Aquí</p>              
                <p class="text-blue-700 mt-2 underline cursor-pointer">Examinar</p>
            </div>

            <!-- Formulario -->
            <form class="mt-6">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="nom_doc" class="block mb-2 text-sm font-medium text-gray-900">Nombre del documento</label>
                        <input type="text" id="nom_doc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="TareaAlexis.pdf" required />
                    </div>
                    <div>
                        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                        <input type="text" id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Este es el archivo PDF de la tarea de hoy" required />
                    </div>
                </div>

                <div>
                    <label for="link" class="block mb-2 text-sm font-medium text-gray-900">Link</label>
                    <input type="url" id="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="UASLP.COM" required />
                </div>
            </form>
        </div>
    </div>
</x-esqueleto>
