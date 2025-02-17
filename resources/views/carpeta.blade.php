<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <section class="bg-white pt-3 min-h-screen">
      <x-rutas/>
      <div class="py-0 px-4 mx-auto max-w-screen-xl lg:py-2 lg:px-6">
        <h1 class="text-3xl font-bold mb-3 text-start text-blue-700">Sistema de Archivos</h1>
  
        <!-- Contenedor dinámico -->
        <div id="mainView">
          <button id="createFolderBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Crear Carpeta
          </button>
  
          <!-- Vista de carpetas -->
          <div class="py-3 px-2 mx-auto max-w-screen-xl lg:py-5 lg:px-5 
    border-4 border-gray-300 rounded-lg bg-gray-200 mt-2 pt-0">
            <div id="folderContainer" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                <!-- Carpetas dinámicas -->  
            </div>
          </div>
        </div>
  
        <!-- Vista dentro de una carpeta -->
        <div id="folderView" class="hidden">
            <h2 id="folderName" class="text-xl font-bold mt-4 text-blue-700"></h2>
            <button id="backButton" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-500 mb-4 text-white">
                Volver atrás
            </button>
        </div>
      </div>
    </section>
    <script src="{{ asset('js/carpetas.js') }}"></script>
</x-esqueleto>
  