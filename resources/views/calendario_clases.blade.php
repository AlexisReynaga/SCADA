<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <section class="py-8 px-4 mx-auto max-w-screen-xl">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-900">Calendario de Clases</h2>
        </div>

        <!-- Botón para cambiar semestre -->
        <div class="text-center mb-4">
            <button id="toggleSemester" class="px-4 py-2 bg-blue-900 text-white rounded-lg shadow hover:bg-blue-600">
                Cambiar Semestre
            </button>
        </div>

        <!-- Contenedor del calendario -->
        <div class="grid grid-cols-5 gap-4 bg-gray-200 p-6 rounded-lg shadow-md border border-gray-300" id="calendar">
            <!-- Encabezado (Días de la semana) -->
            <div class="text-center font-bold text-gray-900">Lunes</div>
            <div class="text-center font-bold text-gray-900">Martes</div>
            <div class="text-center font-bold text-gray-900">Miércoles</div>
            <div class="text-center font-bold text-gray-900">Jueves</div>
            <div class="text-center font-bold text-gray-900">Viernes</div>
        </div>
        <script src="{{ asset('js/calendario.js') }}"></script>
    </section>
</x-esqueleto>
