<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <section class="py-8 px-4 mx-auto max-w-screen-xl">
        <!-- Botón para cambiar semestre -->
        <div class="text-center mb-4">
            <button id="toggleSemester" class="px-4 py-1.5 font-bold bg-blue-800 text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Cambiar Semestre
            </button>
            <a href="{{ route('carpeta') }}" class="px-4 py-2 font-bold bg-blue-800 text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Archivos de la sesión
            </a>
        </div>

        <!-- Filtros -->
        <div class="text-center mb-4 w-1/2 bg-gray-200 p-6 rounded-lg shadow-md border border-gray-300 mx-auto">
            <label for="filterMonth" class="mr-2 font-bold text-blue-800">Filtrar clases</label>
            <select id="filterMonth" class="px-4 py-2 border rounded-lg ">
                <option value="">Todos los meses</option>
                <option value="0">Enero</option>
                <option value="1">Febrero</option>
                <option value="2">Marzo</option>
                <option value="3">Abril</option>
                <option value="4">Mayo</option>
                <option value="5">Junio</option>
                <option value="6">Julio</option>
                <option value="7">Agosto</option>
                <option value="8">Septiembre</option>
                <option value="9">Octubre</option>
                <option value="10">Noviembre</option>
                <option value="11">Diciembre</option>
            </select>

            <button id="pastDays" class="px-4 py-2 bg-blue-800 font-bold text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Días Pasados
            </button>
            <button id="futureDays" class="px-4 py-2 bg-blue-800 font-bold text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Días Futuros
            </button>
        </div>

        <!-- Contenedor del calendario -->
        <div
            class="grid grid-cols-5 gap-4 bg-gray-200 p-6 rounded-lg shadow-md border border-gray-300"
            id="calendar"
            data-url="{{ route('sesion') }}"
        >
            <!-- Encabezado (Días de la semana) -->
            <div class="text-center font-bold text-gray-900">Lunes</div>
            <div class="text-center font-bold text-gray-900">Martes</div>
            <div class="text-center font-bold text-gray-900">Miércoles</div>
            <div class="text-center font-bold text-gray-900">Jueves</div>
            <div class="text-center font-bold text-gray-900">Viernes</div>
        </div>

        <!-- Tu script debe ir después del elemento #calendar -->
        <script src="{{ asset('js/calendario.js') }}"></script>
        <!-- Eliminamos el segundo div con id="calendar" -->
    </section>
</x-esqueleto>
